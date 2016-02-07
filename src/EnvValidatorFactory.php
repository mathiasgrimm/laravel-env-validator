<?php namespace MathiasGrimm\LaravelEnvValidator;
use Illuminate\Contracts\Validation\Validator;

/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:42
 */
class EnvValidatorFactory
{
    public static function buildFromConfig($config, Validator $validator)
    {
        return new EnvValidator($config, $validator);
    }

    public static function buildFromLaravelConfig()
    {
        $config    = \Config::get('laravel-env-validator');
        $validator = \Validator::make($_SERVER, $config);

        return static::buildFromConfig($config, $validator);
    }
}
