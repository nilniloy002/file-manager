<?php

Route::get('folders/tree', [
    'as' => 'admin.folders.tree',
    'uses' => 'FolderTreeController@index',
    'middleware' => 'can:admin.folders.index',
]);

Route::get('user-folder/tree', [
    'as' => 'admin.user-folder.tree',
    'uses' => 'FolderTreeController@userFolderTree',
]);

Route::put('folders/tree', [
    'as' => 'admin.folders.tree.update',
    'uses' => 'FolderTreeController@update',
    'middleware' => 'can:admin.folders.edit',
]);

Route::get('folders', [
    'as' => 'admin.folders.index',
    'uses' => 'FolderController@index',
    'middleware' => 'can:admin.folders.index',
]);

Route::post('folders', [
    'as' => 'admin.folders.store',
    'uses' => 'FolderController@store',
    'middleware' => 'can:admin.folders.create',
]);

Route::get('folders/{id}', [
    'as' => 'admin.folders.show',
    'uses' => 'FolderController@show',
    'middleware' => 'can:admin.folders.edit',
]);

Route::put('folders/{id}', [
    'as' => 'admin.folders.update',
    'uses' => 'FolderController@update',
    'middleware' => 'can:admin.folders.edit',
]);

Route::delete('folders/{id}', [
    'as' => 'admin.folders.destroy',
    'uses' => 'FolderController@destroy',
    'middleware' => 'can:admin.folders.destroy',
]);

Route::get('folders/{id}/download/{path}', [
    'as' => 'admin.folders.download',
    'uses' => 'FolderController@download',
    
]);
Route::post('folders/create-assign', [
    'as' => 'admin.folders.storeWithAssign',
    'uses' => 'FolderController@storeWithAssign',
    'middleware' => 'can:admin.folders.create',
]);
