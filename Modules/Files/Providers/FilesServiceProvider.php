<?php

namespace Modules\Files\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Base\Traits\AddsAsset;
use Modules\Base\Traits\LoadsConfigFile;
use Modules\Admin\Http\ViewComposers\AssetsComposer;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Files\Admin\Tabs\FilesTabs;

class FilesServiceProvider extends ServiceProvider
{
    use AddsAsset, 
        LoadsConfigFile;
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('files', FilesTabs::class);
        
        View::composer('files::admin.files.create', AssetsComposer::class);
        //View::composer('files::admin.files.manager', AssetsComposer::class);

        $this->addAssets('admin.files.(index|create|manager)', ['admin.files.css', 'admin.jstree.js','admin.files.js']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadConfigs(['assets.php', 'permissions.php']);
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

}
