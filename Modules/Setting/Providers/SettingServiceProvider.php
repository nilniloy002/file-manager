<?php

namespace Modules\Setting\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Base\Traits\AddsAsset;
use Modules\Base\Traits\LoadsConfigFile;
use Modules\Setting\Admin\Tabs\SettingTabs;
use Modules\Admin\Ui\Facades\TabManager;

class SettingServiceProvider extends ServiceProvider
{
    use AddsAsset, LoadsConfigFile;
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('settings', SettingTabs::class);

        $this->addAssets('admin.settings.edit', ['admin.setting.js','admin.media.js','admin.media.css']);
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
