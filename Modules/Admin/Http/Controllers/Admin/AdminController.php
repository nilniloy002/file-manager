<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Modules\User\Entities\Role;
use Illuminate\Support\Carbon;
use Modules\Files\Entities\Files;
class AdminController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::dashboard.index', [
            'totalUsers' => User::totalUsers(),
            'totalFiles' => $this->totalFiles(),
        ]);
    }

    private function totalFiles()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }
        return Files::when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->count();
    }

}
