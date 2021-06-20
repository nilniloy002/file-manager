<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['slug'=>'admin','name' => 'Admin', 'permissions' => $this->getAdminRolePermissions()]);

        Role::create(['slug'=>'user','name' => 'User','permissions' => $this->getUserRolePermissions()]);
    }

    /**
     * Get admin role permissions.
     *
     * @return array
     */
    private function getAdminRolePermissions()
    {
        return [
            // users
            'admin.users.index' => true,
            'admin.users.create' => true,
            'admin.users.edit' => true,
            'admin.users.destroy' => true,
            // roles
            'admin.roles.index' => true,
            'admin.roles.create' => true,
            'admin.roles.edit' => true,
            'admin.roles.destroy' => true,
            // translations
            'admin.translations.index' => true,
            'admin.translations.edit' => true,
            // settings
            'admin.settings.edit' => true,
            // Files
            'admin.files.manager' => true,
            'admin.files.index' => true,
            'admin.files.create' => true,
            'admin.files.edit' => true,
            'admin.files.destroy' => true,
            // files-extension
            'admin.files-extension.index' => true,
            'admin.files-extension.create' => true,
            'admin.files-extension.destroy' => true,
            // files-folder
            'admin.files-folder.index' => true,
            'admin.files-folder.create' => true,
            'admin.files-folder.destroy' => true,
            // Activity
            'admin.activity.index' => true,
            
        ];
    }
    
    /**
     * Get user role permissions.
     *
     * @return array
     */
    private function getUserRolePermissions()
    {
        return [
            //Files
            'admin.files.index' => true,
            'admin.files.create' => true,
            'admin.files.edit' => true,
            'admin.files.destroy' => true,
             // Activity
            'admin.activity.index' => true,
            
        ];
    }
}
