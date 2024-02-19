<?php

use App\Http\Controllers\PermissionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\RolesController;


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
// Route::middleware(['auth'])->group(function () {
    Route::resource('trabajadores', TrabajadorController::class)->names('admin.workers');
    Route::resource('roles', RolesController::class)->names('admin.roles');
    Route::resource('permisos', PermissionsController::class)->names('admin.permissions');
    // Route::resource('trabajadores', TrabajadorController::class)->middleware('can:admin.workers.index')->names('admin.workers');
// });
