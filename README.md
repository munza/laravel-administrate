# laravel-administrate

*UNDER DEVELOPMENT*

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Basic administration package to create generalized CRUD functionality for Laravel and Lumen.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require munza/laravel-administrate
```

## Usage

``` php
$skeleton = new Munza\Administrate();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email tawsif.aqib@gmail.com instead of using the issue tracker.

## Credits

- [Tawsif Aqib][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/munza/laravel-administrate.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/munza/laravel-administrate/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/munza/laravel-administrate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/munza/laravel-administrate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/munza/laravel-administrate.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/munza/laravel-administrate
[link-travis]: https://travis-ci.org/munza/laravel-administrate
[link-scrutinizer]: https://scrutinizer-ci.com/g/munza/laravel-administrate/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/munza/laravel-administrate
[link-downloads]: https://packagist.org/packages/munza/laravel-administrate
[link-author]: https://github.com/munza
[link-contributors]: ../../contributors
