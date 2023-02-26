<?php

use App\Http\Controllers\ReestablecerController;
use App\Http\Controllers\RenglonController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //HOME

Route::get('/editarPerfil', [UsuarioController::class, 'index'])->name('editarPerfil'); //Pantalla de edición de perfil

Route::post('/reestablecer', [ReestablecerController::class, 'reestablecer'])->name('reestablecer'); //Envia mail

Route::post('/confirmarNuevaPassword', [ReestablecerController::class, 'confirmarPassword'])->middleware('verificarToken')->name('confirmarPassword'); //Pantalla para cambiar contraseña

Route::post('/crearRenglon', [RenglonController::class,'crearRenglon'])->name('crearRenglon'); //Crear renglón

Route::patch('/reestablecido', [ReestablecerController::class, 'reestablecerPassword'])->name('reestablecerPassword'); //Reestablece la contraseña

Route::patch('/modificarPerfil', [UsuarioController::class,'modificarPerfil'])->name('modificarPerfil'); //Modifica el perfil

Route::patch('/cumplirTarea', [RenglonController::class,'cumplirTarea'])->name('cumplirTarea'); //Marca tareas como cumplidas

Route::patch('/editarTarea', [RenglonController::class,'editarTarea'])->name('editarTarea'); //Vista de edición de tareas

Route::patch('/actualizarRenglon', [RenglonController::class,'actualizarRenglon'])->name('actualizarRenglon'); //Edita tareas

Route::delete('/eliminarTarea', [RenglonController::class,'eliminarTarea'])->name('eliminarTarea'); //Elimina tareas
