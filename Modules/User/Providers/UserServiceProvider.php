<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Modules\Base\Traits\AddsAsset;
use Modules\Base\Traits\LoadsConfigFile;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\User\Admin\Tabs\RoleTabs;
use Modules\User\Admin\Tabs\UserTabs;
use Modules\User\Admin\Tabs\ProfileTabs;
use Modules\User\Guards\Sentinel;
use Modules\User\Contracts\Authentication;
use Modules\User\Repositories\Sentinel\SentinelAuthentication;
use Modules\Admin\Http\ViewComposers\AssetsComposer;
use Modules\User\Http\ViewComposers\CurrentUserComposer;

class UserServiceProvider extends ServiceProvider
{
    use AddsAsset, LoadsConfigFile;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (! config('app.installed')) {
            return;
        }

        TabManager::register('users', UserTabs::class);
        TabManager::register('roles', RoleTabs::class);
        TabManager::register('profile', ProfileTabs::class);

        View::composer('*', CurrentUserComposer::class);
        View::composer('user::admin.auth.layout', AssetsComposer::class);

        $this->addAssets('admin.(login|register|reset).*', ['admin.login.css']);
        $this->addAssets('admin.(users|roles).(create|edit)', ['admin.user.css', 'admin.user.js']);
        
        $this->addAssets('admin.(users).(create|edit)', ['admin.media.css', 'admin.media.js']);
        
        $this->addAssets('admin.(profile).(edit)', ['admin.media.css', 'admin.media.js']);
        
        
        Auth::extend('sentinel-guard', function () {
            return new Sentinel();
        });
        
        $this->registerBladeDirectives();
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

        $this->app->bind(Authentication::class, SentinelAuthentication::class);
    }
    
    /**
     * Register blade directives.
     *
     * @return void
     */
    private function registerBladeDirectives()
    {
        Blade::directive('hasAccess', function ($permissions) {
            return "<?php if (\$currentUser->hasAccess($permissions)) : ?>";
        });

        Blade::directive('endHasAccess', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('hasAnyAccess', function ($permissions) {
            return "<?php if (\$currentUser->hasAnyAccess($permissions)) : ?>";
        });

        Blade::directive('endHasAnyAccess', function () {
            return '<?php endif; ?>';
        });
    }
    
}
