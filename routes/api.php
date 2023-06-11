<?php

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', function (Request $request){
    return datatables()->of(User::with('roles'))
    ->addColumn('btn', 'admin.users.actions')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/medicines', function (Request $request) {

    $search = $request->search;

    return \App\Models\Medicine::where('name', 'like', "%$search%")
    ->orWhere('id', 'slug', 'like', "%$search%")->get();
})->name('api.medicines.index');
