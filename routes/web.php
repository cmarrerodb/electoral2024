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
Route::middleware(['auth'])->group(function () {
    Route::resource('trabajadores', TrabajadorController::class)->names('admin.workers');
    Route::get('/trab_tabla',[TrabajadorController::class,'trab_tabla'])->name('trab_tabla');
    Route::resource('roles', RolesController::class)->names('admin.roles');
    Route::get('roles/{id}/assign', [RolesController::class, 'assign'])->name('admin.roles.assign');
    Route::post('rol2user', [RolesController::class, 'rol2user'])->name('admin.roles.rol2user');
    Route::resource('permisos', PermissionsController::class)->names('admin.permissions');
    Route::get('roles/{id}/search', [RolesController::class, 'search'])->name('admin.roles.search');    
    Route::post('permisos/search', [PermissionsController::class, 'search'])->name('admin.permissions.search');    
    Route::post('trabajador/check', [TrabajadorController::class, 'check'])->name('workers.check');    
    // Route::get('permisos/search', [PermissionsController::class, 'search'])->name('admin.permissions.search');    
    // Route::resource('trabajadores', TrabajadorController::class)->middleware('can:admin.workers.index')->names('admin.workers');
});
