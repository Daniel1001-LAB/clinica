<?php

namespace App\Http\Controllers\Interviews;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index(User $user){
        return view('interviews.index', compact('user'));
    }

    public function detail(Interview $interview){
        // return $interview;
        $patient =  User::find($interview->patient_id);
        $doctor = User::find($interview->doctor_id);
        return view('interviews.detail', compact('interview', 'doctor', 'patient'));
    }



}
