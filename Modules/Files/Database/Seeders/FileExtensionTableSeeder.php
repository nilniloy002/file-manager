<?php

namespace Modules\Files\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Files\Entities\FileExtension;


class FileExtensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        FileExtension::insert([
            ['name' => 'jpeg','assign_toall'=>1],
            ['name' => 'jpg','assign_toall'=>1],
            ['name' => 'png','assign_toall'=>1],
            ['name' => 'pdf','assign_toall'=>1],
            ['name' => 'mp4','assign_toall'=>1],
            ['name' => 'docx','assign_toall'=>1],
        ]);

    }
}
