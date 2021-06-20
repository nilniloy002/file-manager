<?php

namespace Modules\Files\Admin\Table;

use Modules\Admin\Ui\AdminTable;

class FileExtensionTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['action'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
        ->editColumn('assign_toall', function ($ext) {
                if($ext->assign_toall==1){return 'Yes';}else{return 'No';}
            });
            
    }
}
