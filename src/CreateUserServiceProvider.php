<?php

namespace BOAIdeas\CreateUser;

use Illuminate\Support\ServiceProvider;

class CreateUserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/createuser.php' => config_path('createuser.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/createuser.php', 'createuser'
        );

        $this->commands([
            Commands\ListUsers::class,
            Commands\CreateUser::class,
        ]);
    }
}
