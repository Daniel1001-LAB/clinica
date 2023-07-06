<?php

use App\Http\Controllers\Doctor\CurriculumController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Interviews\InterviewController;
use App\Http\Controllers\Statistics\StatisticsController;
use App\Http\Livewire\Doctor\DisaseController;
use App\Http\Livewire\Doctor\HiperController;
use App\Http\Livewire\Doctor\LisemController;

use App\Http\Livewire\Doctor\OfficeController;
use App\Http\Livewire\Doctor\PaiController;
use App\Http\Livewire\Doctor\SurgeryController;
use App\Http\Livewire\Doctor\SymptomController;
use App\Http\Livewire\Doctor\WorkdayController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('doctor.index');
})->middleware('can:doctor.index')->name('doctor.index.home');


Route::middleware('role:doctor')->get('/index', [DoctorController::class, 'index'])->name('doctor.index');
Route::middleware('can:offices.index')->get('/offices',OfficeController::class)->name('offices.index');
Route::middleware('role:doctor')->get('/workdays',WorkdayController::class)->name('workdays.index');
Route::middleware('role:doctor')->get('/curriculum',[CurriculumController::class, 'index'])->name('curriculum.index');
Route::middleware('role:doctor')->get('/interviews/{user}',[InterviewController::class, 'index'])->name('interviews.index');
Route::middleware('role:doctor')->get('/interviews/detail/{interview}',[InterviewController::class, 'detail'])->name('interviews.detail');

Route::middleware('role:doctor')->get('/interviews/detail/{interview}/pdf',[InterviewController::class, 'pdf'])->name('interviews.pdf');

Route::middleware('role:doctor')->get('/disases',DisaseController::class)->name('disases.index');
Route::middleware('role:doctor')->get('/surgeries',SurgeryController::class)->name('surgeries.index');
Route::middleware('role:doctor')->get('/symptoms',SymptomController::class)->name('symptoms.index');

Route::middleware('role:doctor')->get('/lisem',LisemController::class)->name('lisem.index');
Route::middleware('role:doctor')->get('/pai',PaiController::class)->name('pai.index');
Route::middleware('role:doctor')->get('/hiper',HiperController::class)->name('hiper.index');

Route::middleware('role:doctor')->get('/total-suspicions',[StatisticsController::class,'total_suspicions'])->name('statistics.total-suspicions');

Route::middleware('role:doctor')->get('/total-pathologies',[StatisticsController::class,'total_pathologies'])->name('statistics.total-pathologies');

Route::middleware('role:doctor')->get('/total-surgeries',[StatisticsController::class,'total_surgeries'])->name('statistics.total-surgeries');
