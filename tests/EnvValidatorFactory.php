<?php

use MathiasGrimm\LaravelEnvValidator\EnvValidatorFactory as EnvValidatorFactorySrc;

/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:50
 */
class EnvValidatorFactory extends EnvValidatorFactorySrc
{

    public static function buildFromTestConfig(array $override = [])
    {
        $testConfig = require __DIR__ . '/config/laravel-env-validator.php';
        $config     = array_merge($testConfig, $override);

        $env = [];
        foreach (array_keys($config) as $variable) {
            $env[$variable] = env($variable);
        }

        $validator  = \Validator::make($env, $config);

        return static::buildFromValidator($validator);
    }
}
