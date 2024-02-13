<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/trabajadores', function() {
    $trabajadores = App\Models\Trabajadores::all();
    $heads = [
        'CÉDULA',
        'NOMBRE',
        'ESTADO',
        'MUNICIPIO',
        'CIRCUITO',
        'PARROQUIA',
        'GABINETE',
        'ENTE',
        'DEPENDENCIA',
        'TELÉFONO',
        'VOTÓ',
        'OBSERVACIONES',
    ];
    return view('trabajadores',compact('trabajadores','heads'));
})->name('home')->middleware('auth');

