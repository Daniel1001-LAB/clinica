<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->roles->pluck('name')->join('');
            $user = auth()->user();
            switch ($role) {
                case 'super-admin':
                    return redirect()->route('admin.index');
                    break;
                case 'admin':
                    return redirect()->route('admin.index');
                    break;
                case 'doctor':
                    return redirect()->route('doctor.index');
                    break;
                case 'patient':
                    return view('welcome');
                    break;
                case 'user':
                    return view('user.index');
                    break;
                case 'employee':
                    return view('inventory.app');
                    break;
                case 'admin-pos':
                    return view('inventory.app');
                    break;
                case '':
                    return view('welcome');
                    break;
            }
        } else {
            return view('welcome');
        }
    }
}
