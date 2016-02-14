Laravel Env Validator
======

[![Author](http://img.shields.io/badge/author-@reinink-blue.svg?style=flat-square)](https://twitter.com/matgrimm)
[![Source Code](http://img.shields.io/badge/source-league/plates-blue.svg?style=flat-square)](https://github.com/mathiasgrimm/laravel-env-validator)
[![Latest Version](https://img.shields.io/github/release/thephpleague/plates.svg?style=flat-square)](https://github.com/mathiasgrimm/laravel-env-validator/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/league/plates.svg?style=flat-square)](https://packagist.org/packages/mathiasgrimm/laravel-env-validator)

Laravel Env Validator is meant to validate your .env file in order to avoid any unexpected behaviour for not having properly defined some variable or value. 

### Highlights

- Validate you env variables using the Laravel Validator by simple defining rules in a configuration file

## Installation

Plates is available via Composer:

```json
{
    "require": {
        "mathiasgrimm/laravel-env-validator": "1.*"
    }
}
```

```php
// config/app.php

'providers' => [
    ...
    MathiasGrimm\LaravelEnvValidator\ServiceProvider::class,
    ...
],
```

```
php artisan vendor:publish --provider="MathiasGrimm\LaravelEnvValidator\ServiceProvider" --tag="config"
```

## Example
```php
<?php
// config/laravel-env-validator.php

return [
    'SOME_IMPORTANT_VARIABLE' => 'required',
    'ANOTHER_IMPORTANT_ONE'   => 'required|in:TYPE_A,TYPE_B,TYPE_C',
]

```

## Security

If you discover any security related issues, please email mathiasgrimm@gmail.com instead of using the issue tracker.

## Credits

- [Mathias Grimm](https://github.com/mathiasgrimm)

## License

The MIT License (MIT). Please see [License File](https://github.com/thephpleague/plates/blob/master/LICENSE) for more information.
