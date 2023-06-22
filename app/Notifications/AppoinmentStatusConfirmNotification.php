<?php

namespace App\Notifications;

use App\Models\Appoinment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppoinmentStatusConfirmNotification extends Notification
{
    use Queueable;
    protected $appoinment;
    /**
     * Create a new notification instance.
     */
    public function __construct(Appoinment $appoinment)
    {
        $this->appoinment = $appoinment;
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
            ->subject('Cita Confirmada')
            ->view('emails.appoinment-confirm',[
                'notifiable' => $notifiable,
                'appoinment' => $this->appoinment,
            ]);
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
