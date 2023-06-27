<?php

namespace App\Charts;

use App\Models\Appoinment;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppointmentsPerMonthChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->createChart();
    }

    public function createChart()
    {
        $data = Appoinment::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
        // dd($data);

        $months = [
            0 => 'Enero',
            1 => 'Febrero',
            2 => 'Marzo',
            3 => 'Abril',
            4 => 'Mayo',
            5 => 'Junio',
            6 => 'Julio',
            7 => 'Agosto',
            8 => 'Septiembre',
            9 => 'Octubre',
            10 => 'Noviembre',
            11 => 'Diciembre',
        ];
        $appointments = [];

        for ($i = 1; $i <= 12; $i++) {
            $appointments[] = $data[$i] ?? 0;
        }

        $backgroundColor = [];
        $borderColor = [];


        $backgroundColor[] = "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.7)";
        $borderColor[] = "rgb(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ")";




        $this->title('Citas del año por mes');
        $this->labels(array_values($months));
        $this->dataset('Citas', 'radar', array_values($appointments))
            ->options([
                'responsive' => true,
                'backgroundColor' => $backgroundColor,
                // 'borderColor' => 'rgba(38, 32, 59, 0.88)',
                'scales' => [
                    'r' => [
                        'angleLines' => [
                            'display' => false,
                        ],
                        'ticks' => [
                            'beginAtZero' => true,
                            'stepSize' => 1,
                        ],
                    ],
                ],
                'plugins' => [
                    'tooltip' => [
                        'enabled' => true,
                    ],
                ],
            ]);
    }
}
