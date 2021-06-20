<?php

namespace Modules\User\Admin\Tabs;

use Modules\Admin\Ui\CiTab;
use Modules\Admin\Ui\CiTabs;
use Modules\User\Entities\Role;
use Modules\User\Repositories\Permission;
use Modules\Files\Entities\FileExtension;
use Modules\Folder\Entities\Folder;

class UserTabs extends CiTabs
{
    public function make()
    {
        $this->group('user_information', clean(trans('user::users.tabs.group.user_information')))
            ->active()
            ->add($this->general())
            ->add($this->permissions())
            ->add($this->newPassword())
            ->add($this->filesSetting());
    }

    private function general()
    {
        return tap(new CiTab('general', clean(trans('user::users.tabs.general'))), function (CiTab $tab) {
            $tab->active();
            $tab->weight(10);

            $tab->fields([
                'first_name',
                'last_name',
                'email',
                'activated',
                'roles',
            ]);
            $tab->view('user::admin.users.tabs.general', [
                'roles' => Role::list(),
            ]);
        });
    }
    
    private function permissions()
    {
        return tap(new CiTab('permissions', clean(trans('user::users.tabs.permissions'))), function (CiTab $tab) {
            $tab->weight(30);

            $tab->view(function ($data) {
                return view('user::admin.permissions.index', [
                    'entity' => $data['user'],
                    'permissions' => clean(Permission::all()),
                ]);
            });
        });
    }
    
    private function filesSetting()
    {
        
        return tap(new CiTab('files_setting', clean(trans('user::users.tabs.files_setting'))), function (CiTab $tab) {
            $tab->weight(40);
            $tab->fields(['file_extension', 'file_size']);
            $tab->view('user::admin.users.tabs.files_setting',[
                    
                    'fileextensions' => FileExtension::list(),
                    'filefolders' => Folder::treeList(),
                ]);
        });
    }

    private function newPassword()
    {
        if (! request()->routeIs('admin.users.edit')) {
            return;
        }

        return tap(new CiTab('new_password', clean(trans('user::users.tabs.new_password'))), function (CiTab $tab) {
            $tab->weight(50);
            $tab->fields(['password', 'password_confirmation']);
            $tab->view('user::admin.users.tabs.new_password');
        });
    }
    
    
}
