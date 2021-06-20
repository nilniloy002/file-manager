<?php

namespace Modules\Folder\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Base\Traits\AddsAsset;
use Modules\Base\Traits\LoadsConfigFile;

class FolderServiceProvider extends ServiceProvider
{
    use AddsAsset, LoadsConfigFile;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addAssets('admin.folders.index', ['admin.folder.css', 'admin.jstree.js', 'admin.folder.js']);
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
