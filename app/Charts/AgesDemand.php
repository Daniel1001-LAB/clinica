<?php

namespace App\Charts;

use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AgesDemand extends Chart
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
        $userBirthdates = User::pluck('birthdate')->toArray();

        // Calcular los rangos de edad
        $ageRanges = range(0, 100, 10);
        $ageRangesLabels = [];

        // Inicializar el contador para cada rango de edad
        $ageCount = array_fill(0, count($ageRanges), 0);

        // Contar la cantidad de Pacientes en cada rango de edad
        foreach ($userBirthdates as $birthdate) {
            $age = date_diff(date_create($birthdate), date_create('today'))->y;
            foreach ($ageRanges as $index => $range) {
                if ($age >= $range && $age < $range + 10) {
                    $ageCount[$index]++;
                    break;
                }
            }
        }

        $backgroundColor = [];
        $borderColor = [];

        foreach ($ageRanges as $index => $range) {
            $backgroundColor[] = "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.7)";
            $borderColor[] = "rgb(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ")";

            $ageRangesLabels[] = $range . '-' . ($range + 9) . ' años: ' . $ageCount[$index] . ' pacientes';
        }

        $this->title('Distribución de Pacientes por Edad');
        $this->labels($ageRangesLabels);
        $this->dataset('Pacientes', 'horizontalBar', $ageCount)

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
