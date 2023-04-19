<?php

namespace Database\Seeders;

use App\Models\Hour;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hour = '00:00:00';
        $hour = new Carbon($hour);

        for ($i = 0; $i < 48; $i++) {
            if ($i < 12) {
                $turn = 'dawn';
            } elseif ($i >= 12 && $i <= 24) {
                $turn = "morning";
            } elseif ($i > 24 && $i <= 36) {
                $turn = "afternoon";
            } elseif ($i > 36 && $i <= 47) {
                $turn = "evening";
            }

            $interval = $hour->format('g:i A');

            $newHour = Hour::create([
                'time_hour' => $hour,
                'str_hour_12' => $hour->format('g:i A'),
                'str_hour_24' => $hour->toTimeString(),
                'int_hour' => $i,
                'turn' => $turn,
                'interval' => $interval,
            ]);

            $hour->addMinutes(30);
            $interval = $interval . ' - ' . $hour->format('g:i A');
            $newHour->interval = $interval;
            $newHour->save();
        }
    }
}
