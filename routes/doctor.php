<?php

use App\Http\Controllers\Doctor\CurriculumController;
use App\Http\Controllers\Interviews\InterviewController;
use App\Http\Livewire\Doctor\DisaseController;
use App\Http\Livewire\Doctor\OfficeController;
use App\Http\Livewire\Doctor\WorkdayController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
       return view('doctor.index');
})->middleware('can:doctor.index')->name('doctor.index');


Route::middleware('can:offices.index')->get('/offices',OfficeController::class)->name('offices.index');
Route::middleware('role:doctor')->get('/workdays',WorkdayController::class)->name('workdays.index');
Route::middleware('role:doctor')->get('/curriculum',[CurriculumController::class, 'index'])->name('curriculum.index');
Route::middleware('role:doctor')->get('/interviews/{user}',[InterviewController::class, 'index'])->name('interviews.index');

Route::middleware('role:doctor')->get('/disases',DisaseController::class)->name('disases.index');





