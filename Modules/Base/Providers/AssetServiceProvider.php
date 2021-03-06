<?php

namespace Modules\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Base\Foundation\Asset\Manager\AssetManager;
use Modules\Base\Foundation\Asset\Pipeline\AssetPipeline;
use Modules\Base\Foundation\Asset\Manager\CiAssetManager;
use Modules\Base\Foundation\Asset\Pipeline\CiAssetPipeline;
use Modules\Base\Foundation\Asset\Types\AssetTypeFactory as AssetFactory;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! config('app.installed')) {
            return;
        }

        $this->addModulesAssets();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AssetManager::class, CiAssetManager::class);

        $this->app->singleton(AssetPipeline::class, function ($app) {
            return new CiAssetPipeline($app[AssetManager::class]);
        });
    }

    /**
     * Add modules assets to the asset manager.
     *
     * @return void
     */
    private function addModulesAssets()
    {
        foreach ($this->app['modules']->allEnabled() as $module) {
            $assets = config("ci.module.{$module->getLowerName()}.assets");

            if (! is_null($assets)) {
                $this->addAssets($assets);
            }
        }
    }

    /**
     * Add the assets from the config file on the asset manager.
     *
     * @param array $allAssets
     * @return void
     */
    private function addAssets($assets)
    {
        // Add all assets to the AssetManager
        foreach (array_get($assets, 'all_assets', []) as $assetName => $assetPath) {
            $url = $this->app[AssetFactory::class]->make($assetPath)->url();

            $this->app[AssetManager::class]->addAsset($assetName, $url);
        }

        // Add required assets directly to the AssetPipeline
        $this->app[AssetPipeline::class]->requireAssets(array_get($assets, 'required_assets', []));
    }
}
