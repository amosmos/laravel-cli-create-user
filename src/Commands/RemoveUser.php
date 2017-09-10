<?php

namespace BOAIdeas\CreateUser\Commands;

use Illuminate\Console\Command;

class RemoveUser extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:remove
                            {user : The ID of the user to remove}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove an existing laravel user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = config('createuser.model');
        $user = $model::findOrFail($this->argument('user'));

        if ($this->confirm('Are you sure you want to remove "'.$user->email.'"?')) {
            $user->delete();
            $this->info('User "'.$user->email.'" deleted.');
        }
    }
}
