<?php

namespace MahiMahi\EmailLog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\Events\MessageSent;
use MahiMahi\EmailLog\Listeners\LogSentMessage;

class EmailLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */

    protected $listen = [
        MessageSent::class => [
            LogSentMessage::class,
        ],
    ];

     public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'email-log');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'email-log');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('email-log.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/email-log'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/email-log'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/email-log'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'email-log');

        // Register the main class to use with the facade
        $this->app->singleton('email-log', function () {
            return new EmailLog;
        });
    }
}
