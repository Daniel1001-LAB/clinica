<?php

namespace App\Charts;

use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class PatientsCreateDate extends Chart
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
        $data = collect([]);
        for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
            $data->push(User::whereDate('created_at', today()->subDays($days_backwards))->count());
            // dd($data);
        }

        $this->labels(['Hace 2 dias', 'Ayer', 'Hoy']);
        $this->dataset('Pacientes Registrados Recientemente', 'line', $data)
            ->options([
                'borderColor' => 'green',
                'backgroundColor'=>'green',
                'pointStyle' => 'circle',
                'responsive' => true,
                'pointRadius' => 10,
                'pointHoverRadius' => 15,
                'borderDash' => [5,5],
                'fill' => false,
            ]);


    }
}
