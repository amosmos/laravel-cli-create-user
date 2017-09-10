<?php

namespace BOAIdeas\CreateUser\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserAccountCreated extends Notification
{
    /**
     * The password.
     *
     * @var string
     */
    public $password;

    /**
     * Create a notification instance.
     *
     * @param  string  $password
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->greeting('Welcome!')
                    ->line('A user account has been created for you.')
                    ->line('Your user name: '.$notifiable->name)
                    ->line('Your email address: '.$notifiable->email)
                    ->line('Your password: '.$this->password)
                    ->action('Start here!', config('app.url'))
                    ->line('Thank you for using our application!');
    }
}
