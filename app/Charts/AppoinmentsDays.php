<?php

namespace App\Charts;

use App\Models\Appoinment;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppoinmentsDays extends Chart
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
        $data = Appoinment::selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $daysOfWeek = [
            1 => 'Domingo',
            2 => 'Lunes',
            3 => 'Martes',
            4 => 'Miércoles',
            5 => 'Jueves',
            6 => 'Viernes',
            7 => 'Sábado',
        ];
        $appointments = [];

        for ($i = 1; $i <= 7; $i++) {
            $appointments[] = $data[$i] ?? 0;
        }

        $backgroundColor = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ];

        $borderColor = [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ];

        $this->title('Distribución de Citas por Día de la Semana');
        $this->labels(array_values($daysOfWeek));
        $this->dataset('Citas', 'horizontalBar', array_values($appointments))
        ->options([
                'borderColor' => $borderColor,
                'backgroundColor' => $backgroundColor,
                'responsive' => true,
            ]);
    }
}
