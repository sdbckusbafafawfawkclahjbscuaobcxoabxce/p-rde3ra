<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $token;
    public function __construct($token)
    {
        $this->token = $token;
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
            ->greeting("درخواست تغییر رمز عبور")
            ->subject($_SERVER['SERVER_NAME'].' درخواست تغییر پسورد از')
            ->line('پیرو درخواست بازیابی پسورد، لینک بازیابی پسورد برای شما در این پیام ضمیمه شده.')
            ->action('لینک بازیابی',url(config('app.url').route('password.reset', $this->token, false)))
            ->line('در صورتی که دکمه آبی رنگ بالا برای شما کار نمی کند، لینک زیر را در مرورگر خود کپی کنید.')
            ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
