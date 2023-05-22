<?php

namespace App\Http\Controllers\Interviews;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index(User $user){
        return view('interviews.index', compact('user'));
    }


}
