<?php

namespace App\Http\Controllers\Doctor;

use App\Charts\AgesDemand;
use App\Charts\AppoinmentsDays;
use App\Charts\AppointmentsPerMonthChart;
use App\Charts\PatientsCreateDate;
use App\Charts\RankingDoctors;
use App\Charts\SpecialtiesDemand;
use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Disase;
use App\Models\Interview;
use App\Models\Surgery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $isDoctor = $user->hasRole('doctor');
        if ($isDoctor) {
            $find = 'doctor_id';
        } else {
            $find = 'patient_id';
        }



        $interviews = Interview::orderBy('date', 'asc')
            ->where($find, $user->id)->get();

        $latestInterview = $user->latestInterview;

        if ($latestInterview) {
            $date = $latestInterview->date;
            $patientName = $latestInterview->user->name;
            // Realizar acciones con la última entrevista, la fecha y el nombre del paciente
        } else {
            // No se encontraron entrevistas
        }

        $mostCommonSuspicion = Interview::select('suspicion')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('suspicion')
            ->orderBy('count', 'desc')
            ->first();

        if ($mostCommonSuspicion) {
            $suspicion = $mostCommonSuspicion->suspicion;
            $count = $mostCommonSuspicion->count;
            // algo con la sospecha más común y la cantidad
        } else {
            // No se encontraron sospechas
        }

        $mostCommonDisase = Disase::select('disases.name')
            ->selectRaw('COUNT(*) as count')
            ->join('disase_user', 'disases.id', '=', 'disase_user.disase_id')
            ->groupBy('disases.name')
            ->orderBy('count', 'desc')
            ->first();

        if ($mostCommonDisase) {
            $disaseName = $mostCommonDisase->name;
            $count = $mostCommonDisase->count;
            // algo con la enfermedad más común y la cantidad
        } else {
            // No se encontraron enfermedades
        }

        $mostCommonSurgery = Surgery::select('surgeries.name')
            ->selectRaw('COUNT(*) as count')
            ->join('surgery_user', 'surgeries.id', '=', 'surgery_user.surgery_id')
            ->groupBy('surgeries.name')
            ->orderBy('count', 'desc')
            ->first();

        if ($mostCommonSurgery) {
            $disaseName = $mostCommonSurgery->name;
            $count = $mostCommonSurgery->count;
            // algo con la enfermedad más común y la cantidad
        } else {
            // No se encontraron enfermedades
        }


        $recentP = new PatientsCreateDate;
        $recentP->createChart();
        $appoinmentsPerMonth = new AppointmentsPerMonthChart;
        $appoinmentsPerMonth->createChart();
        $ranking = new RankingDoctors;
        $ranking->createChart();
        $appDays = new AppoinmentsDays;
        $appDays->createChart();
        $specialtiesDemand = new SpecialtiesDemand;
        $specialtiesDemand->createChart();
        $agesDemand = new AgesDemand;
        $agesDemand->createChart();

        return view('doctor.index', [
            'interviews' => $interviews, 'mostCommonSuspicion' => $mostCommonSuspicion, 'mostCommonDisase' => $mostCommonDisase,
            'latestInterview' => $latestInterview, 'mostCommonSurgery' => $mostCommonSurgery, 'recentP' => $recentP, 'appoinmentsPerMonth' => $appoinmentsPerMonth,
            'ranking' => $ranking, 'appDays' => $appDays, 'specialtiesDemand' => $specialtiesDemand, 'agesDemand' => $agesDemand,
        ]);
    }

}
