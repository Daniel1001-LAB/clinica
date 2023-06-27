<?php

namespace App\Charts;

use App\Models\Appoinment;
use App\Models\Specialty;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class SpecialtiesDemand extends Chart
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
        $data = Appoinment::select('specialty_id', DB::raw('COUNT(*) as total'))
            ->groupBy('specialty_id')
            ->pluck('total', 'specialty_id')
            ->toArray();

        $specialtyIds = array_keys($data);
        $appointments = array_values($data);

        // Obtener los nombres de las especialidades en base a los ids
        $specialties = Specialty::whereIn('id', $specialtyIds)->pluck('name', 'id')->toArray();

        // Mapear los nombres de especialidad a los ids correspondientes
        $specialtyLabels = array_map(function ($id) use ($specialties) {
            return $specialties[$id] ?? 'Desconocida';
        }, $specialtyIds);


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

        $this->title('Estadísticas de Citas Médicas por Especialidad');
        $this->labels($specialtyLabels);
        $this->dataset('Citas', 'doughnut', $appointments)->options([
            'borderColor' => $borderColor,
            'backgroundColor' => $backgroundColor,
            'responsive' => true,
        ]);
    }
}
