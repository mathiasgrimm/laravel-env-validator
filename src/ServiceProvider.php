<?php namespace MathiasGrimm\LaravelEnvValidator;

/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 18:32
 */

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laravel-env-validator.php' => config_path('laravel-env-validator.php'),
        ], 'config');

        $validator = EnvValidatorFactory::buildFromLaravelConfig();
        $validator->validate();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laravel-env-validator.php', 'laravel-env-validator');
    }
}
