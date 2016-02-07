<?php namespace MathiasGrimm\LaravelEnvValidator;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;

/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:41
 */
class EnvValidator
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var ValidatorContract
     */
    private $validator;

    /**
     * @return ValidatorContract
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param ValidatorContract $validator
     * @return EnvValidator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return EnvValidator
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return EnvValidator
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    public function __construct(array $config, ValidatorContract $validator)
    {
        $this->config    = $config;
        $this->validator = $validator;
    }

    public function validate()
    {
        if ($this->validator->fails()) {
            $msg = 'The .env file has some problems. Please check config/laravel-env-validator.php'
                . PHP_EOL
                . implode(PHP_EOL, $this->validator->messages()->all());

            throw new Exception($msg);
        }
    }
}
