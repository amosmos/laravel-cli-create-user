<?php

namespace BOAIdeas\CreateUser\Commands;

use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show list of all laravel users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = config('createuser.model');
        $users = $model::all(['id', 'name', 'email', 'created_at', 'updated_at'])->toArray();

        if($users->count())
        {
            $headers = ['ID', 'Name', 'E-mail', 'Created at', 'Updated at'];

            $this->info('There are '.$users->count().' users:');
            $this->table($headers, $users);
        }
        else
        {
            $this->error('There are no users!');
        }
}
