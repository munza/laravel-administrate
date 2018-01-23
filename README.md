# laravel-administrate

*UNDER DEVELOPMENT*

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Basic administration package to create generalized CRUD functionality for Laravel and Lumen.


## To-do(s)

- [ ] Add more fields
    - [x] belongs to
    - [x] boolean
    - [ ] date time
    - [x] email
    - [ ] has many
    - [ ] has one
    - [x] number
    - [ ] polymorphic
    - [ ] through
    - [ ] select
    - [x] string
    - [x] text
    - [x] password
- [ ] Add exceptions in trait


## Install

Via Composer

``` bash
$ composer require munza/laravel-administrate
```


## Usage


### Setup

- Run the following command to create the `app\Http\Controllers\AdminController.php`.

```bash
$ php artisan administrate:install
```


### Creating an admin resource

- Create you model and migration with Laravel's default commands.

- Run the following command to create a new admin controller under `app\Http\Controllers` folder.

```bash
$ php artisan administrate:controller <name>
```

- Run the following command to create a new admin dashboard under `app\Dashboards` folder.

```bash
$ php artisan administrate:dashboard <name>
```

- Add the dashboard and model name in the controller file.

```php
// ...
    public function dashboard()
    {
        return <dashboard>::class;
    }

    public function model()
    {
        return <model>::class;
    }
// ...
```

- Edit the dashboard to add fields and attributes.

```php
// ...
    public $label = <resource title>;

    public $routePrefix = <resource route>;

    public $model = <model>::class;

    public function attributeTypes()
    {
        return [
            // list of attribute types of fields. eg.
            // 'name' => StringField::class,
        ];
    }

    public function listAttributes()
    {
        return [
            // list of fields to show at index view. eg.
            // 'name',
        ];
    }

    public function showAttributes()
    {
        return [
            // list of fields to show at single view. eg.
            // 'name',
        ];
    }

    public function formAttributes()
    {
        return [
            // list of fields for form view. eg.
            // 'name',
        ];
    }
// ...
```

## Customizing

- To use a custom view for admin page.

```bash
$ php artisan administrate:views:index <resource>
$ php artisan administrate:views:create <resource>
$ php artisan administrate:views:edit <resource>
$ php artisan administrate:views:show <resource>
```

`<resource>` is optional. This command will generate view files in the application's `resource\views` folder and these files will be used instead of package's default view.

- To edit the default layout views.

```bash
$ php artisan adminisrate:views:layout
```

- To create a new field type.

```bash
$ php artisan administrate:views:field <name>
```

## Bugs & Issues

If you discover any bugs or issues, please open an issue.


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
