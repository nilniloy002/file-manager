<?php

Route::get('media-manager', [
    'as' => 'admin.media.manager',
    'uses' => 'MediaController@mediaManager',
    'middleware' => 'can:admin.media.index',
]);

Route::get('media', [
    'as' => 'admin.media.index',
    'uses' => 'MediaController@index',
    'middleware' => 'can:admin.media.index',
]);

Route::post('media', [
    'as' => 'admin.media.store',
    'uses' => 'MediaController@store',
    'middleware' => 'can:admin.media.create',
]);

Route::delete('media/{ids?}', [
    'as' => 'admin.media.destroy',
    'uses' => 'MediaController@destroy',
    'middleware' => 'can:admin.media.destroy',
]);