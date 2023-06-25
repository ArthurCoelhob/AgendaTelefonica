<?php

use App\Http\Controllers\ContatoController;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contatos', [ContatoController::class, 'index']);
Route::get('contato/{id}', [ContatoController::class, 'show']);
Route::post('contato/', [ContatoController::class, 'store']);
Route::put('contato/{id}', [ContatoController::class, 'update']);
Route::delete('contato/{id}', [ContatoController::class, 'destroy']);