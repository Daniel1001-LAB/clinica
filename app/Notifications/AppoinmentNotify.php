<?php

namespace App\Notifications;

use App\Models\Appoinment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppoinmentNotify extends Notification
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
                    ->subject('Notificación de cita')
                    // ->greeting('Hola ' . $notifiable->name)
                    ->view('emails.appoinment-notify',[
                        'notifiable' => $notifiable,
                        'appoinment' => $this->appoinment,
                    ]);
                    // ->line('Has sido notificado sobre una cita programada para el día ' . $this->appoinment->date)
                    // ->line('Por favor, confirma tu asistencia o comunícate con nosotros si necesitas cancelarla.')
                    // ->line('Gracias por tu atención.');
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
