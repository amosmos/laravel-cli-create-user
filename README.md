# Easily create (and list) Laravel users with a CLI command
[![Latest Version on Packagist](https://img.shields.io/packagist/v/boaideas/laravel-cli-create-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-cli-create-user)
[![Software License](https://img.shields.io/packagist/l/boaideas/laravel-cli-create-user.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/100930843/shield?branch=master)](https://styleci.io/repos/100930843)
[![Total Downloads](https://img.shields.io/packagist/dt/boaideas/laravel-cli-create-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-cli-create-user)

In our projects we build a lot of admin systems for websites, and we use Laravel authentication for admin log-in to the system. Once the site is launched we always create admin accounts for our customers to log in to the production site.

Using this artisan command it's easy to create admin accounts from the CLI whenever you need them. We also added a command to list all existing users.

## Requirements

The package is based on the defaul User model that ships with Laravel, so it assumes you're using a User model with name, email and password fields (and of course that these fields are migrated to your DB). Of course the package lets you change the default "User" model name if you're using a different name.

## Installation

You can install the package via composer:

```bash
composer require boaideas/laravel-cli-create-user
```

If you're installing the package on Laravel 5.5 or higher, you're done (The package uses Laravel's auto package discovery which will be available from version 5.5 onwards).

If you're using Laravel 5.4 or less, install the `BOAIdeas\CreateUser\CreateUserServiceProvider` service provider:

```php
// config/app.php

'providers' => [
    ...
    BOAIdeas\CreateUser\CreateUserServiceProvider::class,
];
```

## Configuration

By default, the package assumes your User model is called User and validates your model input with the default validation rules that Laravel uses for uses creation.

If you want to change any of these settings, you can publish the config-file with:

```bash
php artisan vendor:publish --provider="BOAIdeas\CreateUser\CreateUserServiceProvider"
```

This is the content of the published config file:

```php
return [
    /*
    * The class name of the media model to be used.
    */
    'model' => 'App\User',

    /*
    * The validation rules to check for user model input.
    */
    'validation_rules' => [
    	'name' => 'string|max:255',
    	'email' => 'string|email|max:255|unique:users',
    	'password' => 'string|min:6',
    ],

];
```

## Usage

#### Create User
From youe CLI execute:

```bash
php artisan user:create
```

You will be asked for the user's name, email and password, and then the user account will be created. Your input will be validated.

#### List Users
From youe CLI execute:

```bash
php artisan user:list
```

## Credits

- [Amos Shacham](https://github.com/amosmos)
- [All Contributors](../../contributors)

## Alternatives

- [laravel-make-user](https://github.com/michaeldyrynda/laravel-make-user)
- [laravel-cli-user](https://github.com/subdesign/laravel-cli-user)
- [create-user-command](https://github.com/rap2hpoutre/create-user-command)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
