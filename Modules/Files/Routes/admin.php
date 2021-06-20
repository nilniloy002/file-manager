<?php

Route::get('files-manager', [
    'as' => 'admin.files.manager',
    'uses' => 'FilesController@filesManager',
    'middleware' => 'can:admin.files.manager',
]);

Route::get('files', [
    'as' => 'admin.files.index',
    'uses' => 'FilesController@index',
    'middleware' => 'can:admin.files.index',
]);

Route::get('files-upload', [
    'as' => 'admin.files.create',
    'uses' => 'FilesController@create',
    'middleware' => 'can:admin.files.create',
]);

Route::post('files', [
    'as' => 'admin.files.store',
    'uses' => 'FilesController@store',
    'middleware' => 'can:admin.files.create',
]);

Route::get('files/{id}/edit', [
    'as' => 'admin.files.edit',
    'uses' => 'FilesController@edit',
    'middleware' => 'can:admin.files.edit',
]);

Route::put('files/{id}/edit', [
    'as' => 'admin.files.update',
    'uses' => 'FilesController@update',
    'middleware' => 'can:admin.files.edit',
]);

Route::delete('files/{ids?}', [
    'as' => 'admin.files.destroy',
    'uses' => 'FilesController@destroy',
    'middleware' => 'can:admin.files.destroy',
]);
Route::post('files/move/', 'FilesController@movefiles')->name('admin.files.movefiles');
Route::post('files/downloadzip/', 'FilesController@downloadZip')->name('admin.files.downloadZip');

Route::get('files/download/{ids}', 'FilesController@download')->name('admin.files.download');
Route::get('files/fileshare/{ids}', 'FilesController@fileshare')->name('admin.files.fileshare');
Route::post('files/generatelink/', 'FilesController@generatelink')->name('admin.files.generatelink');
Route::post('files/sendemail/', 'FilesController@sendemail')->name('admin.files.sendemail');
Route::post('files/unlock/{ids}', 'FilesController@unlock')->name('admin.files.unlock');

Route::get('files-extension', [
    'as' => 'admin.files-extension.index',
    'uses' => 'FileExtensionController@index',
    'middleware' => 'can:admin.files-extension.index',
]);

Route::get('files-extension/create', [
    'as' => 'admin.files-extension.create',
    'uses' => 'FileExtensionController@create',
    'middleware' => 'can:admin.files-extension.create',
]);

Route::post('files-extension', [
    'as' => 'admin.files-extension.store',
    'uses' => 'FileExtensionController@store',
    'middleware' => 'can:admin.files-extension.create',
]);


Route::delete('files-extension/{ids?}', [
    'as' => 'admin.files-extension.destroy',
    'uses' => 'FileExtensionController@destroy',
    'middleware' => 'can:admin.files-extension.destroy',
]);