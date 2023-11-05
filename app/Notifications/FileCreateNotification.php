<?php

namespace App\Notifications;

use App\Models\FileOut;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FileCreateNotification extends Notification
{
    use Queueable;

    private Fileout $fileout;

    /**
     * Create a new notification instance.
     */
    public function __construct(Fileout $fileout)
    {
        $this->fileout = $fileout;
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
                    ->greeting("Hi Contractor/Staff")
                    ->line($this->fileout->description)
                    ->action($this->fileout['actiontext'], $this->fileout['actionurl'])
                    ->line("Thank you from the NDDC.");
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
