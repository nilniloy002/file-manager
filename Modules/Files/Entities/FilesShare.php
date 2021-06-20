<?php

namespace Modules\Files\Entities;

use Illuminate\Support\Facades\Storage;
use Modules\Files\Helpers\FilesIcon;
use Modules\Files\Admin\Table\FilesTable;
use Modules\Base\Eloquent\Model;
use Modules\User\Entities\User;

class FilesShare extends Model
{
    
    protected $fillable = [
        'share_id', 
        'user_id', 
        'pwd', 
        'files', 
    ];
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    
    public static function findByShareId($id)
    {
        return static::where('share_id', $id)->first();
    }
    
    public function setFilesAttribute(array $files)
    {
        $this->attributes['files'] = json_encode($files);
    }
    
    public function getFilesAttribute($value)
    {
        
        return json_decode($value);
    }
    
}
