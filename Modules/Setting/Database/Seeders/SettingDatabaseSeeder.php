<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'supported_locales' => ['en'],
            'default_locale' => 'en',
            'default_timezone' => 'UTC',
            'allow_registrations' => '1',
            'enable_file_preview' => '1',
            'enable_file_download' => '1',
            'enable_file_move' => '1',
            'enable_file_share' => '1',
            'auto_approve_user' => '1',
            'default_file_size' => '10',
            'auto_assign_folder_files' => '1',
            'delete_assign_folder_files' => '1',
            'theme_logo_header_color' => 'blue',
            'theme_navbar_header_color' => 'blue2',
            'theme_sidebar_color' => 'white',
            'theme_background_color' => 'bg1',
        ]);
    }
}
