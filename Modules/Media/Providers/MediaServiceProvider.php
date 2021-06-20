<?php

namespace Modules\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Base\Traits\AddsAsset;
use Modules\Base\Traits\LoadsConfigFile;
use Modules\Admin\Http\ViewComposers\AssetsComposer;

class MediaServiceProvider extends ServiceProvider
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
        
        
        View::composer('media::admin.media.create', AssetsComposer::class);
        View::composer('media::admin.media.manager', AssetsComposer::class);
        
        $this->addAssets('admin.media.(index|edit|manager)', ['admin.media.css','admin.media.js']);
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
