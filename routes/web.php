<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PrincipalController;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Artisan;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PrincipalController::class,'index'])->name('principal.index');
Route::get('/cmd/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
})->middleware('auth');

Route::get('/inicio', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio');
Route::get('/paquetes/crear', [PaqueteController::class, 'crear'])->name('paquetes.crear');
Route::resource('productos', ProductoController::class);
Route::resource('paquetes', PaqueteController::class);
Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);


Route::get('/reservas/{id}', [ReservaController::class,'show'])->name('reservas.show');

Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');

Route::get('/{page}', [PagesController::class, 'show'])->name('pages.show');

Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/paquetes/{paquete}', [PaqueteController::class, 'show'])->name('paquetes.show');

Route::get('/reservas/{id}/pdf', [ReservaController::class, 'descargarPDF'])->name('reservas.pdf');
Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');

Route::get('/reservas/{id}/editEstado', [ReservaController::class, 'editEstado'])->name('reservas.editEstado');
Route::put('/reservas/{id}/updateEstado', [ReservaController::class, 'updateEstado'])->name('reservas.updateEstado');
Route::get('/buscar-productos', [ProductoController::class,'index'])->name('buscar.productos');

Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
  