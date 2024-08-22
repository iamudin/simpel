<?php
namespace Leazycms\Simpel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Leazycms\Simpel\Middleware\SimpelMiddleware;

class SimpelServiceProvider extends ServiceProvider
{
    protected function registerRoutes()
    {
        Route::middleware(['web','admin.simpel'])
        ->domain(parse_url(config('app.url'), PHP_URL_HOST))
        ->prefix(admin_path())
        ->group(function () {
            $this->loadRoutesFrom(__DIR__.'/routes/admin.php');
        });

        Route::middleware(['web'])
        ->domain('simpel.'.parse_url(config('app.url'), PHP_URL_HOST))
        ->group(function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });

    }
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'simpel');
    }

    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
    }


    public function boot(Router $router)
    {
        $router->aliasMiddleware('admin.simpel', SimpelMiddleware::class);
        $this->registerResources();
        $this->registerMigrations();
        $this->add_extension();
        $this->registerRoutes();
    }
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/config/config.php", "simpel");
    }
    function add_extension()
    {
        if (!collect(config('modules.extension_module'))->where('path','simpel')->count()) {
            add_extension(config('simpel'));
        }
    }
}
