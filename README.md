# Easily add Laravel users with a CLI command
[![Latest Version on Packagist](https://img.shields.io/packagist/v/boaideas/laravel-add-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-add-user)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/100930843/shield?branch=master)](https://styleci.io/repos/100930843)
[![Total Downloads](https://img.shields.io/packagist/dt/boaideas/laravel-add-user.svg?style=flat-square)](https://packagist.org/packages/boaideas/laravel-add-user)

In our projects we build a lot of admin system for website, and we use Laravel authentication for admin log in to the system. Once the site is launched we always add admin accounts for our customers to log in to the production site.

Using this artisan command it's easy to add admin accounts from the CLI whenever you need them.

## Requirements

This command assumes you're using the regular and original Laravel User model.

## Installation

You can install the package via composer:

```bash
composer require boaideas/laravel-add-user
```

Next add the `BOAIdeas\AddUser\Commands\AddUser` class to your console kernel.

```php
// app/Console/Kernel.php

protected $commands = [
   ...
    \BOAIdeas\AddUser\Commands\AddUser::class,
]
```

## Usage

From youe CLI you can execute:

```bash
php artisan user:create
```
