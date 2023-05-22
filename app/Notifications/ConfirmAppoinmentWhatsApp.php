<?php

namespace App\Notifications;

use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\WhatsAppChannel;
use App\Models\Appoinment;
use App\Models\Patient;
use App\Order;


class OrderProcessed extends Notification
{
    use Queueable;


    public $order;

    public function __construct(Appoinment $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        $patient = Patient::find('patient_id');
        $appointment = $patient->appointments()->latest()->first();
        $company = 'UAPS San Luis Planes';
        $appointmentDate = $appointment->date;
        $patientPhone = $patient->phone;

        return (new WhatsAppMessage)
            ->content("Hi {{$company}} notify at,  Your appointment is coming up on {{$appointmentDate}}");
    }
}
