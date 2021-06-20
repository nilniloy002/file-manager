<?php

namespace Modules\Folder\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class FolderTreeResponse implements Responsable
{
    /**
     * folders collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $folders;

    /**
     * Create a new instance.
     *
     * @param \Illuminate\Database\Eloquent\Collection $folders
     */
    public function __construct($folders)
    {
        $this->folders = $folders;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json($this->transform());
    }

    /**
     * Transform the folders.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transform()
    {
        return $this->folders->map(function ($folders) {
            return [
                'id' => $folders->id,
                'icon' => "far fa-folder",
                'parent' => $this->getParentId($folders),
                'text' => $this->getFolderText($folders),
                'data' => [
                    'position' => $folders->position,
                ],
            ];
        });
    }
    private function getParentId($folder) {
       
        if($this->folders->where('id',$folder->parent_id)->count()){
             return $folder->parent_id;
        }else{
            return '#';
        }
        //return $folder->parent_id ?: '#';
    }
    
    private function getFolderText($folder) {
        
        return $folder->name;//.' (<i class="far fa-file"></i> '.$folder->files->count().')';
    }
}
