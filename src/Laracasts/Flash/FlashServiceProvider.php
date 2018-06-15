<?php

namespace Laracasts\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return base_path('config/flash.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/flash.php';
        $this->mergeConfigFrom($configPath, 'flash');

        $this->app->bind(
            'Laracasts\Flash\SessionStore',
            'Laracasts\Flash\LaravelSessionStore'
        );

        $this->app->singleton('flash', function ($app) {
            //return $this->app->make('Laracasts\Flash\FlashNotifier');
            return $this->app->make($app['flash']['notifier']);
        });


    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'flash');

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/flash')
        ]);
    }

}
