<?php

use App\Http\Controllers\ChatbotController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\Reports\ExportController;
use App\Http\Livewire\Asignar\AsignarController;
use App\Http\Livewire\Cashouts\CashoutsController;
use App\Http\Livewire\Category\CategoriesController;
use App\Http\Livewire\DashboardPos\DashboardController;
use App\Http\Livewire\Denomination\CoinsController;
use App\Http\Livewire\Permissions\PermissionsController;
use App\Http\Livewire\Pos\PosController;
use App\Http\Livewire\Product\ProductsController;
use App\Http\Livewire\Reports\ReportsController;
use App\Http\Livewire\Roles\RolesController;
use App\Http\Livewire\Users\UsersController;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Specialty;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->user()) {
        if (User::role(['admin', 'doctor', 'admin-pos'])) {
            return redirect('redirects');
        }
    } else {
        $doctors = Doctor::orderBy('name')->get();

        return view('welcome', compact('doctors'));
    }
});


// RUTAS DEL POS
Route::middleware(['auth'])->group(function () {
    Route::get('dash', DashboardController::class, 'InventoryController@index');
    Route::get('categories', CategoriesController::class)->middleware('role:admin-pos|admin');
    Route::get('products', ProductsController::class);
    Route::get('coins', CoinsController::class);
    Route::get('pos', PosController::class);

    Route::group(['middleware' => ['role:admin-pos|admin']], function () {
        Route::get('roles', RolesController::class);
        Route::get('permissions', PermissionsController::class);
        Route::get('asignar', AsignarController::class);
        Route::get('users', UsersController::class);
    });

    Route::get('cashout', CashoutsController::class);
    Route::get('reports', ReportsController::class);

    //REPORTES PDF POS
    Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
    Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);

    Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
    Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
});

Route::post('send', [ChatbotController::class, 'sendChat']);
Route::post('/chat-openai', [OpenAIController::class, 'chatOpenAi'])->middleware('web');
// GOOGLE
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    // dd($user);

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    if ($userExists) {
        Auth::login($userExists);
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',

        ]);

        Auth::login($userNew);
    }
    // $user->token

    return redirect('redirects');
});



// FACEBOOK
Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/facebook-callback', function () {
    $user = Socialite::driver('facebook')->user();
    //dd($user);

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();
    if ($userExists) {
        Auth::login($userExists);
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'facebook',

        ]);

        Auth::login($userNew);
    }
    // $user->token

    return redirect('redirects');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('redirects');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::middleware(['auth:sanctum', 'verified'])->get('redirects', [HomeController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
