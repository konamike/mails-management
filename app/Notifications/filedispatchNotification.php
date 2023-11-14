<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class filedispatchNotification extends Notification
{
    use Queueable;
    private $filedispatchData;

    /**
     * Create a new notification instance.
     */
    public function __construct($filedispatchData)
    {
        $this->filedispatchData = $filedispatchData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->line($this->filedispatchData['body'])
            ->action($this->filedispatchData['urltext'], $this->filedispatchData['url'])
            ->line($this->filedispatchData['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
