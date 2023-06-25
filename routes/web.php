<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

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
Route::resource('/contatos', ContatoController::class);
Route::get('/search', [ ContatoController::class, 'search'])->name('contatos.search');
Route::get('/log', [ ContatoController::class, 'log'])->name('contatos.log');

