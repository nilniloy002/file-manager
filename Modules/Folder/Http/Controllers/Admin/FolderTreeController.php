<?php

namespace Modules\Folder\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Folder\Entities\Folder;
use Modules\Folder\Services\FolderTreeUpdater;
use Modules\Folder\Http\Responses\FolderTreeResponse;

class FolderTreeController extends Controller
{
    /**
     * Display folder tree in json.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Folder::withoutGlobalScope('isactive')
            ->orderByRaw('-position DESC')
            ->get();

        return new FolderTreeResponse($folders);
    }

    /**
     * Update folder tree in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        FolderTreeUpdater::update(request('folder_tree'));

        return clean(trans('folder::messages.folder_order_saved'));
    }
    
    public function userFolderTree()
    {
        if(auth()->user()->isAdmin()){
            $folders = Folder::orderByRaw('-position DESC')->get();
             return new FolderTreeResponse($folders);
        }
        $folders=auth()->user()->folders;
        if($folders->isNotEmpty()) {
            /* $foldersId=$folders->pluck('id')->toArray();
            $folders=Folder::whereIn('id',$foldersId)->orWhereIn('parent_id',$foldersId)->get(); */
           return new FolderTreeResponse($folders);
        }
        $folders = Folder::where('assign_toall',1)->orderByRaw('-position DESC')
            ->get();

        return new FolderTreeResponse($folders);
    }
}
