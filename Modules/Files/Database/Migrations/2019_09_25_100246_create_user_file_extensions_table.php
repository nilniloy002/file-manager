<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFileExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_file_extensions', function (Blueprint $table) {
            
            $table->integer('user_id')->unsigned();
            $table->integer('file_extension_id')->unsigned();
            
            $table->primary(['user_id', 'file_extension_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('file_extension_id')->references('id')->on('file_extensions')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_file_extensions');
    }
}
