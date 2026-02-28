<?php
namespace Acme\B2BAccount\Providers;

use Illuminate\Support\ServiceProvider;
use Acme\B2BAccount\Console\Commands\InstallCommand;

class B2BAccountServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'b2baccount');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([InstallCommand::class]);
        }
    }

    public function register()
    {
        $this->app->register(ModuleServiceProvider::class);
        $this->mergeConfigFrom(dirname(__DIR__) . '/Config/menu.php', 'menu.customer');
    }
}