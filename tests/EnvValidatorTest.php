<?php /**
 * User: Mathias Grimm <mathiasgrimm@gmail.com>
 * Date: 07/02/2016
 * Time: 17:54
 */
class EnvValidatorTest extends TestCase
{


    public function test_it()
    {
        $envValidator = EnvValidatorFactory::buildFromTestConfig();
        $envValidator->validate();
    }
}
