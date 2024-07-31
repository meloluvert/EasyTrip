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

Route::get('/', function () {
    return view('index');
})->name('inicio');


// Rotas para o Motorista
Route::get('/motoristas', [App\Http\Controllers\ControladorMotorista::class, 'index'])->name('exibeMotorista');
Route::get('/motorista/novo', [App\Http\Controllers\ControladorMotorista::class, 'create'])->name('novoMotorista');
Route::post('/motorista', [App\Http\Controllers\ControladorMotorista::class, 'store'])->name('gravaNovoMotorista');
Route::get('/motorista/editar/{id}', [App\Http\Controllers\ControladorMotorista::class, 'edit'])->name('editarMotorista');
Route::post('/motorista/{id}', [App\Http\Controllers\ControladorMotorista::class, 'update'])->name('atualizaMotorista');
Route::get('/motorista/apagar/{id}', [App\Http\Controllers\ControladorMotorista::class, 'destroy'])->name('deletaMotorista');

// Rotas Passageiro
Route::get('/passageiros', [App\Http\Controllers\ControladorPassageiro::class, 'index'])->name('exibePassageiro');
Route::get('/passageiro/novo', [App\Http\Controllers\ControladorPassageiro::class, 'create'])->name('novoPassageiro');
Route::post('/passageiro', [App\Http\Controllers\ControladorPassageiro::class, 'store'])->name('gravaNovoPassageiro');
Route::get('/passageiro/editar/{id}', [App\Http\Controllers\ControladorPassageiro::class, 'edit'])->name('editarPassageiro');
Route::post('/passageiro/{id}', [App\Http\Controllers\ControladorPassageiro::class, 'update'])->name('atualizaPassageiro');
Route::get('/passageiro/apagar/{id}', [App\Http\Controllers\ControladorPassageiro::class, 'destroy'])->name('deletaPassageiro');

// Rotas Local
Route::get('/locais', [App\Http\Controllers\ControladorLocal::class, 'index'])->name('exibeLocal');
Route::get('/local/novo', [App\Http\Controllers\ControladorLocal::class, 'create'])->name('novoLocal');
Route::post('/local', [App\Http\Controllers\ControladorLocal::class, 'store'])->name('gravaNovoLocal');
Route::get('/local/editar/{id}', [App\Http\Controllers\ControladorLocal::class, 'edit'])->name('editarLocal');
Route::post('/local/{id}', [App\Http\Controllers\ControladorLocal::class, 'update'])->name('atualizaLocal');
Route::get('/local/apagar/{id}', [App\Http\Controllers\ControladorLocal::class, 'destroy'])->name('deletaLocal');

//Rotas Carro
Route::get('/carros', [App\Http\Controllers\ControladorCarro::class, 'index'])->name('exibeCarro');
Route::get('/carro/novo', [App\Http\Controllers\ControladorCarro::class, 'create'])->name('novoCarro');
Route::post('/carro', [App\Http\Controllers\ControladorCarro::class, 'store'])->name('gravaNovoCarro');
Route::get('/carro/editar/{id}', [App\Http\Controllers\ControladorCarro::class, 'edit'])->name('editarCarro');
Route::post('/carro/{id}', [App\Http\Controllers\ControladorCarro::class, 'update'])->name('atualizaCarro');
Route::get('/carro/apagar/{id}', [App\Http\Controllers\ControladorCarro::class, 'destroy'])->name('deletaCarro');


Route::get('/viagems', [App\Http\Controllers\ControladorViagem::class, 'index'])->name('exibeViagem');
Route::get('/viagem/novo', [App\Http\Controllers\ControladorViagem::class, 'create'])->name('novoViagem');
Route::post('/viagem', [App\Http\Controllers\ControladorViagem::class, 'store'])->name('gravaNovoViagem');
Route::get('/viagem/editar/{id}', [App\Http\Controllers\ControladorViagem::class, 'edit'])->name('editarViagem');
Route::post('/viagem/{id}', [App\Http\Controllers\ControladorViagem::class, 'update'])->name('atualizaViagem');
Route::get('/viagem/apagar/{id}', [App\Http\Controllers\ControladorViagem::class, 'destroy'])->name('deletaViagem');
Route::get('/pesquisaViagem', [App\Http\Controllers\ControladorAutores::class, 'pesquisaAutor'])->name('pesquisaViagem');
Route::get('/procuraViagem', [App\Http\Controllers\ControladorAutores::class, 'procuraAutor'])->name('procuraViagem');


// Rotas para o ControladorPassageiroViagem
Route::get('/viagemPassageiros/detalhes/{id}', [App\Http\Controllers\ControladorPassageiroViagem::class, 'index'])->name('exibeDetalhesViagem');
Route::post('/viagemPassageiros', [App\Http\Controllers\ControladorPassageiroViagem::class, 'store'])->name('gravaNovoPassageiroViagem');
Route::get('/viagemPassageiros/apagar/{viagem_id}/{passageiro_id}', [App\Http\Controllers\ControladorPassageiroViagem::class, 'destroy'])->name('deletaPassageiroViagem');

Route::get('/novoPassageiroViagem/{id}', [App\Http\Controllers\ControladorViagem::class, 'novoPassageiro'])->name('novoPassageiroViagem');