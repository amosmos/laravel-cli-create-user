<?php

namespace BOAIdeas\CreateUser\Commands;

use BOAIdeas\CreateUser\Notifications\UserAccountCreated as UserAccountCreatedNotification;
use Illuminate\Console\Command;
use Validator;

class CreateUser extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new laravel user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->validate_ask('Enter user name', ['name' => config('createuser.validation_rules.name')]);
        $email = $this->validate_ask('Enter user email', ['email' => config('createuser.validation_rules.email')]);

        if ($this->confirm('Do you wish to create a random password?')) {
            $password = str_random(8);
            $this->info('*The randomly created password is: '.$password);
        } else {
            $password = $this->validate_ask('Enter user password', ['password' => config('createuser.validation_rules.password')]);
        }

        $model = config('createuser.model');

        $user = new $model();

        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        $this->info('New user created!');

        if ($this->confirm('Do you wish to send the user a notification with their credentials?')) {
            $user->notify(new UserAccountCreatedNotification($password));
            $this->info('Email sent.');
        }
    }

    public function validate_ask($question, $rules)
    {
        $value = $this->ask($question);

        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->error($validate);
            $value = $this->validate_ask($question, $rules);
        }

        return $value;
    }

    public function validateInput($rules, $value)
    {
        $validator = Validator::make([key($rules) => $value], $rules);

        if ($validator->fails()) {
            return $error = $validator->errors()->first(key($rules));
        }

        return true;
    }
}
