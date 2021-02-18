<?php

namespace Hisway\VipClient;

use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider;

class VipClientServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/vip.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('vip.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('vip');
        }
        $this->mergeConfigFrom($source, 'vip');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory($this->app);
        $this->registerManager($this->app);
    }

    /**
     * Register the factory class.
     *
     * @param \Illuminate\Contracts\Foundation\Application | Laravel\Lumen\Application $app
     *
     * @return void
     */
    protected function registerFactory($app)
    {
        $app->singleton('vipclient.factory', function ($app) {
            return new Factories\VipClientFactory();
        });
        $app->alias('vipclient.factory', 'Hisway\VipClient\Factories\VipClientFactory');
    }

    /**
     * Register the manager class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerManager($app)
    {
        $app->singleton('vipclient', function ($app) {
            $config = $app['config'];
            $factory = $app['vipclient.factory'];
            return new VipClientManager($config, $factory);
        });
        $app->alias('vipclient', 'Hisway\VipClient\VipClientManager');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'vipclient',
            'vipclient.factory',
        ];
    }
}