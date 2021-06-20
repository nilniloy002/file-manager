<?php

namespace Modules\Folder\Entities;

use Illuminate\Support\Facades\Cache;
use TypiCMS\NestableTrait;
use Modules\Base\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Files\Entities\Files;
use Modules\Base\Traits\Sluggable;

class Folder extends Model
{
    use Sluggable, NestableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'name','slug', 'position', 'assign_toall', 'is_active', 'public_download'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'assign_toall' => 'boolean',
        'public_download' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addIsActiveGlobalScope();
        
    }
    
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }
    
    public function files()
    {
        
        return $this->hasMany(Files::class);
    }
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    public function isRoot()
    {
        return $this->exists && is_null($this->parent_id);
    }
    
    public static function getUsersFolderlist()
    {
        $file_folders=auth()->user()->folders->pluck('name', 'id');
        if($file_folders->isNotEmpty()) {
            return  $file_folders;
        }
        return static::where('assign_toall',1)->get()->pluck('name', 'id');
         
        
    }
    
    public function user()
    {
        
        return $this->belongsToMany(User::class, 'user_folders');
    }

    public static function tree()
    {
        return Cache::tags(['folders'])->rememberForever('folders.tree:', function () {
            return static::orderByRaw('-position DESC')->get()->nest();
        });
    }

    public static function treeList()
    {
        return Cache::tags(['folders'])->rememberForever('folders.tree_list:', function () {
            return static::orderByRaw('-position DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }
    
}
