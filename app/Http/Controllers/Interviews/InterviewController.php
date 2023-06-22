<?php

namespace App\Http\Controllers\Interviews;

use App\Http\Controllers\Controller;
use App\Models\File;

use App\Models\Interview;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewController extends Controller
{

    public function index(User $user)
    {
        $gender = ['masculino', 'femenino'];

        return view('interviews.index', compact('user', 'gender'));
    }

    public function detail(Interview $interview)
    {

        $patient = User::find($interview->patient_id);
        $doctor = User::find($interview->doctor_id);

        return view('interviews.detail', compact('interview', 'doctor', 'patient'));
    }

    public function create(User $user)
    {

        $user;
        $doctor = auth()->user();
        $existe = Interview::where('user_id', $user->id)
            ->where('doctor_id', auth()->user()->id)->where('done', 0)->exists();

       if($existe){
        $interview = Interview::where('user_id', $user->id)
        ->where('doctor_id', auth()->user()->id)->where('done', 0)->first();

       }else{
        $interview = Interview::create([
            'user_id' => $user->id,
            'doctor_id' => auth()->user()->id,
            'date' => now(),
        ]);
       }

        $gender = $user->gender;

        return view('interviews.create', compact('doctor', 'user', 'interview', 'gender'));

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

    public function ficha($fileId){
        $ficha = File::find($fileId);
        if($ficha->extension !== 'pdf'){
           return view('interviews.ficha',compact('ficha'));
        }else{
          return redirect(asset($ficha->url));}

    }

}
