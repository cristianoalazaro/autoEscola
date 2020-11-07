<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadInstrutoresController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecepController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VeiculoController;

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

//Login
Route::post('/painel',[UsuarioController::class,'login'])->name('usuarios.login');
Route::get('/',[UsuarioController::class, 'logout'])->name('usuarios.logout');

//Usuários
Route::get('/usuarios',[UsuarioController::class,'index'])->name('usuarios.index');
Route::delete('/usuarios/{item}',[UsuarioController::class,'delete'])->name('usuarios.delete');
Route::get('/usuarios/{item}/delete',[UsuarioController::class,'modal'])->name('usuarios.modal');

//Instrutores
Route::get('/instrutores',[CadInstrutoresController::class,'index'])->name('instrutores.index');
Route::post('/instrutores', [CadInstrutoresController::class, 'insert'])->name('instrutores.insert');
Route::get('/instrutores/inserir', [CadInstrutoresController::class,'create'])->name('instrutores.inserir');
Route::get('/instrutores/{item}/editar',[CadInstrutoresController::class,'editar'])->name('instrutores.editar');
Route::put('/instrutores/{item}',[CadInstrutoresController::class,'edit'])->name('instrutores.edit');
Route::delete('/instrutores/{item}',[CadInstrutoresController::class,'delete'])->name('instrutores.delete');
Route::get('/instrutores/{item}/delete',[CadInstrutoresController::class,'modal'])->name('instrutores.modal');

//Recepcionistas
Route::get('/recep',[RecepController::class,'index'])->name('recep.index');
Route::post('/recep', [RecepController::class, 'insert'])->name('recep.insert');
Route::get('/recep/inserir', [RecepController::class,'create'])->name('recep.inserir');
Route::get('/recep/{item}/editar',[RecepController::class,'editar'])->name('recep.editar');
Route::put('/recep/{item}',[RecepController::class,'edit'])->name('recep.edit');
Route::delete('/recep/{item}',[RecepController::class,'delete'])->name('recep.delete');
Route::get('/recep/{item}/delete',[RecepController::class,'modal'])->name('recep.modal');

//Categorias
Route::get('/categorias',[CategoriaController::class,'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'insert'])->name('categorias.insert');
Route::get('/categorias/inserir', [CategoriaController::class,'create'])->name('categorias.inserir');
Route::get('/categorias/{item}/editar',[CategoriaController::class,'editar'])->name('categorias.editar');
Route::put('/categorias/{item}',[CategoriaController::class,'edit'])->name('categorias.edit');
Route::delete('/categorias/{item}',[CategoriaController::class,'delete'])->name('categorias.delete');
Route::get('/categorias/{item}/delete',[CategoriaController::class,'modal'])->name('categorias.modal');

//Veículos
Route::get('/veiculos',[VeiculoController::class,'index'])->name('veiculos.index');
Route::post('/veiculos', [VeiculoController::class, 'insert'])->name('veiculos.insert');
Route::get('/veiculos/inserir', [VeiculoController::class,'create'])->name('veiculos.inserir');
Route::get('/veiculos/{item}/editar',[VeiculoController::class,'editar'])->name('veiculos.editar');
Route::put('/veiculos/{item}',[VeiculoController::class,'edit'])->name('veiculos.edit');
Route::delete('/veiculos/{item}',[VeiculoController::class,'delete'])->name('veiculos.delete');
Route::get('/veiculos/{item}/delete',[VeiculoController::class,'modal'])->name('veiculos.modal');

Route::get('home-admin',[AdminController::class,'index'])->name('admin.index');
Route::put('/admin/{usuario}',[AdminController::class,'editar'])->name('admin.editar');
