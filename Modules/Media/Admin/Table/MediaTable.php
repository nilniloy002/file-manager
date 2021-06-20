<?php

namespace Modules\Media\Admin\Table;

use Modules\Admin\Ui\AdminTable;
use Illuminate\Support\Facades\Crypt;

class MediaTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['action','size'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('thumbnail', function ($file) {
                return view('admin::include.table.thumbnail', compact('file'));
            })
            ->editColumn('size', function ($media) {
                return display_filesize($media->size);
            })
            ->editColumn('uploader', function ($file) {
                if($file->uploader()->exists())
                {
                   return $file->uploader->full_name;
                }
                return '-';
            })
            ->editColumn('action', function ($media) {
               return view('media::admin.media.include.action', compact('media'));
            });
            
    }
}
