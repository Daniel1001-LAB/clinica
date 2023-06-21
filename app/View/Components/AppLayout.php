<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $user = Auth::user();
        $role = $user->role;

        if ($role === 'admin') {
            return view('navigation-menu');
        } elseif ($role === 'doctor') {
            return view('components.menu-doctor-nav');
        } elseif ($role === 'patient') {
            return view('components.menu-user-nav');
        }
        return view('layouts.app');
    }
}
