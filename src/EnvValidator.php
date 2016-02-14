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
    public function setValidator(ValidatorContract $validator)
    {
        $this->validator = $validator;
        return $this;
    }

    public function __construct(ValidatorContract $validator)
    {
        $this->validator = $validator;
    }

    public function validate()
    {
        if ($this->validator->fails()) {

            $messages = [];

            foreach ($this->validator->messages()->all("The :key variable is not defined or invalid") as $var => $message) {
                $messages[] = $message;
            }

            $msg = 'The .env file has some problems. Please check config/laravel-env-validator.php'
                . PHP_EOL
                . implode(PHP_EOL, $messages);

            throw new Exception($msg);
        }
    }
}
