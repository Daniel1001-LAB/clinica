<?php

namespace App\Console\Commands;

use App\Models\Appoinment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearUnconfirmedAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:clear-unconfirmed-appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear unconfirmed appointments that have passed the date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appointments = Appoinment::where('status', Appoinment::PENDING)
            ->where('date', '<', Carbon::now())
            ->update(['status' => Appoinment::UNREALIZED]);
            // dd($appointments);
        $this->info('Unconfirmed appointments cleared successfully.');
    }
}
