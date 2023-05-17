<?php

namespace App\Listeners;

use App\Models\Appoinment;
use App\Models\User;
use App\Notifications\AppoinmentStatusCancelNotification;
use App\Notifications\AppoinmentStatusConfirmNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AppoinmentStatusListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $patient = User::find($event->appoinment->patient_id);
        if ($event->appoinment->status == Appoinment::CONFIRMED) {
            Notification::send($patient, new AppoinmentStatusConfirmNotification($event->appoinment));
        } else {
            Notification::send($patient, new AppoinmentStatusCancelNotification($event->appoinment));
        }
    }
}
