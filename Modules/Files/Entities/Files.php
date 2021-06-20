<?php

namespace Modules\Files\Entities;

use Illuminate\Support\Facades\Storage;
use Modules\Files\Helpers\FilesIcon;
use Modules\Files\Admin\Table\FilesTable;
use Modules\Base\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Folder\Entities\Folder;

class Files extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($file) {
            Storage::disk($file->disk)->delete($file->getOriginal('path'));
        });
    }
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    
    public static function findByIds($ids)
    {
        return static::with('folder')->whereIn('id', $ids)->get();
    }
    
    public function uploader()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id','id');
    }
    
    public function table($request)
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
            $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }
        $query = $this->with('uploader')->newQuery()
            ->when(! is_null($request->type) && $request->type !== 'null', function ($query) use ($request) {
                $query->where('mime', 'LIKE', "{$request->type}/%");
            })
            ->when(! is_null($request->extension) && $request->extension !== 'null', function ($query) use ($request) {
                $extension=explode(',',$request->extension);
                $query->whereIn('extension', $extension);
            })
            ->when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            });
            

        return new FilesTable($query);
    }
    
    public function icon()
    {
        return FilesIcon::getIcon($this->mime);
    }
    
    public function getPathAttribute($path)
    {
        if (! is_null($path)) {
            return Storage::disk($this->disk)->url($path);
        }
    }

    public function isImage()
    {
        return strtok($this->mime, '/') === 'image';
    }
    
    public function isVideo()
    {
        return strtok($this->mime, '/') === 'video';
    }
    
}
