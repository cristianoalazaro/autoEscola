<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadInstrutoresController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [HomeController::class,'home'])->name('home');

Route::post('/painel',[UsuarioController::class,'login'])->name('usuarios.login');
Route::get('/',[UsuarioController::class, 'logout'])->name('usuarios.logout');

Route::get('/instrutores',[CadInstrutoresController::class,'index'])->name('instrutores.index');
Route::post('/instrutores/insert', [CadInstrutoresController::class, 'insert'])->name('instrutores.insert');
Route::get('/instrutores/inserir', [CadInstrutoresController::class,'create'])->name('instrutores.inserir');
Route::get('/instrutores/{item}/editar',[CadInstrutoresController::class,'editar'])->name('instrutores.editar');
Route::put('/instrutores/{item}',[CadInstrutoresController::class,'edit'])->name('instrutores.edit');

Route::get('home-admin',[AdminController::class,'index'])->name('admin.index');
Route::put('/admin/{usuario}',[AdminController::class,'editar'])->name('admin.editar');
