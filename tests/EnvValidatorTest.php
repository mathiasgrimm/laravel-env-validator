<?php
/**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:54
 */

// @TODO remove it
require __DIR__ . '/EnvValidatorFactory.php';

class EnvValidatorTest extends TestCase
{


    /**
     * @test
     */
    public function it_has_the_right_error_message()
    {
        try {
            unset($_SERVER['VAR_1']);
            unset($_SERVER['VAR_2']);

            $envValidator = EnvValidatorFactory::buildFromTestConfig([
                'VAR_1' => 'required',
                'VAR_2' => 'required',
            ]);
            $envValidator->validate();

            $this->fail("It should not get here!");
        } catch (MathiasGrimm\LaravelEnvValidator\Exception $e) {
            $this->assertContains("The VAR_1 variable is not defined or invalid", $e->getMessage());
            $this->assertContains("The VAR_2 variable is not defined or invalid", $e->getMessage());
        } catch (Exception $e) {
            $this->fail("It should not get here!");
        }
    }

    /**
     * @test
     */
    public function it_does_not_throw_exception_if_validation_is_met()
    {
        try {
            $_SERVER['VAR_1'] = '123';
            $_SERVER['VAR_2'] = 'A';

            $envValidator = EnvValidatorFactory::buildFromTestConfig([
                'VAR_1' => 'required',
                'VAR_2' => 'required|in:A,B,C'
            ]);
            $envValidator->validate();
            $this->assertTrue(true);
        } catch (Exception $e) {
            $this->fail("It should not get here!");
        }
    }

    /**
     * @test
     */
    public function it_doest_not_throw_exception_if_no_configuration_is_defined()
    {
        $envValidator = EnvValidatorFactory::buildFromTestConfig();
        $envValidator->validate();
        $this->assertTrue(true);
    }
}
