<?php namespace MathiasGrimm\LaravelEnvValidator;
use Illuminate\Contracts\Validation\Validator;

/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:42
 */
class EnvValidatorFactory
{
    public static function buildFromValidator(Validator $validator)
    {
        return new EnvValidator($validator);
    }

    public static function buildFromLaravelConfig()
    {
        $config    = \Config::get('laravel-env-validator');

        // there is a bug that would not load APP_ENV into $_SERVER or $_ENV
        // therefore I had to read based on what was defined in the config file
        $env = [];
        foreach (array_keys($config) as $variable) {
            $env[$variable] = env($variable);
        }

        $validator = \Validator::make($env, $config);

        return static::buildFromValidator($validator);
    }
}
