<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
       return view('admin.index');
})->middleware('can:admin.index')->name('admin.index');


Route::resource('/roles',RoleController::class)->names('roles');
Route::resource('/users',UserController::class)->names('users');
Route::resource('/specialties',SpecialtyController::class)->names('specialties');




