<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\UsuariosController;

Route::controller(TarefasController::class)->group(function () {
    Route::get('/tarefas', 'listarTarefas');
});

Route::controller(UsuariosController::class)->group(function () {
    Route::post('/cadastrar', 'cadastrar');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
