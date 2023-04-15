<?php


use App\Http\Livewire\Doctor\OfficeController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
       return view('doctor.index');
})->middleware('can:doctor.index')->name('doctor.index');


Route::middleware('can:offices.index')->get('/offices',OfficeController::class)->name('offices.index');





