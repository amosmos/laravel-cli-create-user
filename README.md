# Easily create Laravel users with a CLI command
[![Latest Version on Packagist](https://img.shields.io/packagist/v/boaideas/laravel-cli-create-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-cli-create-user)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/100930843/shield?branch=master)](https://styleci.io/repos/100930843)
[![Total Downloads](https://img.shields.io/packagist/dt/boaideas/laravel-cli-create-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-cli-create-user)

In our projects we build a lot of admin systems for websites, and we use Laravel authentication for admin log-in to the system. Once the site is launched we always create admin accounts for our customers to log in to the production site.

Using this artisan command it's easy to create admin accounts from the CLI whenever you need them.

## Requirements

This command assumes you're using the regular and original Laravel User model (of course you can name it whatever you like).

## Installation

You can install the package via composer:

```bash
composer require boaideas/laravel-cli-create-user
```

Next, install the `BOAIdeas\CreateUser\Commands\CreateUserServiceProvider` service provider:

```php
// config/app.php

'providers' => [
    ...
    BOAIdeas\CreateUser\Commands\CreateUserServiceProvider::class,
];
```

This package has support for Laravel's auto package discovery, which will be available from version 5.5 onwards.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="BOAIdeas\CreateUser\Commands\CreateUserServiceProvider"
```

This is the contents of the published config file:

```php
return [
    /*
    * The class name of the media model to be used.
    */
    'model' => 'App\User'
];
```

## Usage

From youe CLI you can execute:

```bash
php artisan user:create
```

You will be asked for the user's name, email and password, and then the user account will be created.

## Credits

- [Amos Shacham](https://github.com/amosmos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
