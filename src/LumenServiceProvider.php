<?php namespace MathiasGrimm\LaravelEnvValidator;

use Illuminate\Support\ServiceProvider as Provider;

class LumenServiceProvider extends Provider
{
    public function boot()
    {
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
