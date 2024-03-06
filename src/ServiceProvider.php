<?php

namespace Me42th\Pogwaf;

use Illuminate\Foundation\Console\AboutCommand;
use Me42th\Pogwaf\Console\PogwafCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/pogwaf.php' => config_path('pogwaf.php'),
        ],'pogwaf');

        $this->mergeConfigFrom(
            __DIR__.'/../config/pogwaf.php', 'pogwaf'
        );

        AboutCommand::add('Pogwaf', fn () => ['Version' => '0.0.1']);
        if ($this->app->runningInConsole()) {
            $this->commands([
                PogwafCommand::class
            ]);
        }
    }
}
