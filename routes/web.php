<?php

use App\Http\Controllers\CalendariController;
use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");


//ROUTE DE LA PARTE DE CLIENTE
//Route::get("inici", [ClienteController::class, "inici"])->name("inici");
Route::get('/inici', function () {
    return view('cliente/inici');
})->name("inici");

Route::get('/calendari', function () {
    return view('cliente/calendari');
})->name("calendari");

Route::get('/fitxatge', function () {
    return view('cliente/fitxatge');
})->name("fitxatge");

//FIN DE ROUTE DE LA PARTE DE CLIENTE

//ROUTE DE LA PARTE DE ADMINISTRADOR

Route::get('/pin', function () {
    return view('admin/pin');
})->name("pin");
//FIN DE ROUTE DE LA PARTE DE ADMINISTRADOR



Route::post('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    //dd($userExists);
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
    return redirect('/inici');
    // $user->token
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
