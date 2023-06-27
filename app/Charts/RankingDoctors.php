<?php

namespace App\Charts;

use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class RankingDoctors extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function createChart()
    {
        $doctors = Appoinment::select('doctor_id', DB::raw('count(*) as total_appointments'))
            ->groupBy('doctor_id')
            ->orderBy('total_appointments', 'desc')
            ->take(5)
            ->get();

        $doctorNames = [];
        $appointmentCounts = [];

        foreach ($doctors as $doctor) {
            $doctorNames[] = User::find($doctor->doctor_id)->name;
            $appointmentCounts[] = $doctor->total_appointments;
        }

        $this->title('Ranking de Médicos por Número de Citas');
        $this->labels($doctorNames);
        $this->dataset('Número de Citas', 'bar', $appointmentCounts)
        ->options([
            'borderColor' => 'rgba(61, 122, 239, 0.8)',
            'backgroundColor'=>'rgba(61, 122, 239, 0.5)',
            'responsive' => true,
            'fill' => false,
            'borderWidth' => [2],
            'borderRadius' => [15],
            'borderSkipped' => false,
        ]);
    }

}
