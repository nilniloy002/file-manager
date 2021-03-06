<?php

namespace Modules\User\Admin\Table;

use Modules\Admin\Ui\AdminTable;

class UserTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['last_login','profile_image'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('profile_image', function ($user) {
                $path = optional($user->profile_image)->path;

                return view('user::admin.users.include.thumbnail', compact('path'));
            })
            ->editColumn('last_login', function ($user) {
                return view('admin::include.table.date')->with('date', $user->last_login);
            })
            ->editColumn('status', function ($user) {
                return $user->isActivated()
                    ? '<button type="button" class="btn btn-icon btn-success btn-xs"><i class="fas fa-check"></i></button>'
                    : '<button type="button" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-times"></i></button>';
            });
    }
}
