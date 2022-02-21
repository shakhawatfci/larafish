<?php
namespace Arifuzzaman\FindFish;

// use App\TraitsFolder\BladeDirectives;

use Illuminate\Support\ServiceProvider;

class FindFishServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // dd('LaraTrackerServiceProvider');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/config/findfish.php' => config_path('findfish.php'),
        ]);
        //
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'find-fish');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/find-fish'),
        ]);

        // $kernel->pushMiddleware(PurchaseChecker::class);

    }

}
