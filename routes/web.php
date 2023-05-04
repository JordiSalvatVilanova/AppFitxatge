<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FitxatgeController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
})->middleware("guest"); // GUEST -> INVITADO


//ROUTE DE LA PARTE DE ADMINISTRADOR
Route::get('/pin', function () {
    return view('admin/pin');
})->name("pin");
//FIN DE ROUTE DE LA PARTE DE ADMINISTRADOR

//ROUTE DE LA PARTE DE GOOGLE
Route::post('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google')->middleware("guest");

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
})->middleware("guest");
//FIN DE ROUTE DE LA PARTE DE GOOGLE


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //ROUTE DE LA PARTE DE CLIENTE
    Route::get("inici", [ClienteController::class, "inici"])->name("inici");

    Route::get('/agenda', function () {
        return view('cliente/agenda');
    })->name("agenda");

    Route::get('/fitxatge', function () {
        return view('cliente/fitxatge');
    })->name("fitxatge");


    Route::post("fitxatge/entrada", [FitxatgeController::class, 'entrada'])->name("fitxatge.entrada"); // nombre --> controlador.funcion
    Route::post("fitxatge/pausa", [FitxatgeController::class, 'pausa'])->name("fitxatge.pausa"); // nombre --> controlador.funcion
    Route::post("fitxatge/continuacio", [FitxatgeController::class, 'continuacio'])->name("fitxatge.continuacio"); // nombre --> controlador.funcion
    Route::post("fitxatge/sortida", [FitxatgeController::class, 'sortida'])->name("fitxatge.sortida"); // nombre --> controlador.funcion

    Route::get("fitxatge/mostrar/{fecha}", [FitxatgeController::class, 'devolverfitxarge']); // nombre --> controlador.funcion

    //FIN DE ROUTE DE LA PARTE DE CLIENTE
});
