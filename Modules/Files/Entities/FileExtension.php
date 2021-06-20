<?php

namespace Modules\Files\Entities;

use Modules\Files\Admin\Table\FileExtensionTable;
use Modules\Base\Eloquent\Model;

class FileExtension extends Model
{
    
    protected $fillable = [
        'name', 'assign_toall'
    ];
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    
    public function table($request)
    {
        return new FileExtensionTable($this->newQuery());
    }
    
    /**
     * Get a list of all roles.
     *
     * @return array
     */
    public static function list()
    {
        return static::get()->pluck('name', 'id');
    }
    
    public static function getUsersExtension()
    {
        $file_extensions=auth()->user()->file_extensions->pluck('name', 'id');
        
        if($file_extensions->isNotEmpty()) {
            return  $file_extensions;
        }
        return static::where('assign_toall',1)->get()->pluck('name', 'id');
         
        
    }
    
}
