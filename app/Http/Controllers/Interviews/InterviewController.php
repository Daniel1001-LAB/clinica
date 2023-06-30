<?php

namespace App\Http\Controllers\Interviews;

use App\Http\Controllers\Controller;
use App\Models\File;

use App\Models\Interview;
use App\Models\Medicine;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;


class InterviewController extends Controller
{
    public $interview, $patient;

    public function index(User $user)
    {
        $gender = ['male', 'female'];

        return view('Interviews.index', compact('user', 'gender'));
    }

    public function detail(Interview $interview)
    {

        $patient = User::find($interview->patient_id);
        $doctor = User::find($interview->doctor_id);

        return view('Interviews.detail', compact('interview', 'doctor', 'patient'));
    }

    public function pdf(Interview $interview)
    {
        $patient = User::find($interview->patient_id);
        $doctor = User::find($interview->doctor_id);

        // Obtener los medicamentos del paciente relacionados con la entrevista actual
        $patient_medicines = $patient->medicines()
            ->withPivot('dosage', 'instruction')
            ->wherePivot('interview_id', $interview->id)
            ->paginate(10);
        //dd($patient_medicines);

        $patient_symptoms = $patient->symptoms()
            ->wherePivot('interview_id', $interview->id)
            ->paginate(10);
        $this->interview = $interview;
        $pdf = Pdf::loadView('Interviews.pdf', [
            'interview' => $interview,
            'doctor' => $doctor,
            'patient' => $patient,
            'patient_medicines' => $patient_medicines,
            'patient_symptoms' => $patient_symptoms,
        ]);


        // return $pdf->stream();

        $customReportName = 'entrevista#_'.$patient->id . $interview->id .'.pdf';
        return $pdf->download($customReportName);
        // return view('interviews.pdf', compact('interview', 'doctor', 'patient', 'patient_medicines', 'patient_symptoms'));
    }


    public function create(User $user)
    {

        $user;
        $doctor = auth()->user();
        $existe = Interview::where('user_id', $user->id)
            ->where('doctor_id', auth()->user()->id)->where('done', 0)->exists();

        if ($existe) {
            $interview = Interview::where('user_id', $user->id)
                ->where('doctor_id', auth()->user()->id)->where('done', 0)->first();
        } else {
            $interview = Interview::create([
                'user_id' => $user->id,
                'doctor_id' => auth()->user()->id,
                'date' => now(),
            ]);
        }

        $gender = $user->gender;

        return view('Interviews.create', compact('doctor', 'user', 'interview', 'gender'));
    }

    public function patientUpdate(Request $request, User $user)
    {
        $input = $request->validate([
            'cedula' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $user->forceFill([
            'cedula' => $input['cedula'],
            'name' => $input['name'],
            //'email' => $input['email'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'gender' => $input['gender'],
            'birthdate' => $input['birthdate'],
        ])->save();
        return redirect()->route('interviews.index', $user->id);
    }

    public function ficha($fileId)
    {
        $ficha = File::find($fileId);
        if ($ficha->extension !== 'pdf') {
            return view('Interviews.ficha', compact('ficha'));
        } else {
            return redirect(asset($ficha->url));
        }
    }
}
