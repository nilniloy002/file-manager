<?php

namespace Modules\Files\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class FileFolderTreeResponse implements Responsable
{
    /**
     * fileFolders collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $fileFolders;

    /**
     * Create a new instance.
     *
     * @param \Illuminate\Database\Eloquent\Collection $fileFolders
     */
    public function __construct($fileFolders)
    {
        $this->fileFolders = $fileFolders;
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
     * Transform the categories.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transform()
    {
        return $this->fileFolders->map(function ($fileFolder) {
            return [
                'id' => $fileFolder->id,
                'parent' => '#',
                'text' => $fileFolder->name,
                /* 'data' => [
                    'position' => $category->position,
                ], */
            ];
        });
    }
}
