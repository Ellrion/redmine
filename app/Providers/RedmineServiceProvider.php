<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Redmine\Client;

class RedmineServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('redmine', function ($app) {
            $key = $app['config']->has('services.redmine.key')
               ? $app['config']->get('services.redmine.key', '')
               : $app['config']->get('services.redmine.user', '')
            ;
            $client = new Client(
                $app['config']->get('services.redmine.url'),
                $key,
                $app['config']->get('services.redmine.password', null)
            );
            return $client;
        });
    }

}
