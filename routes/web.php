<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

Route::controller(TarefasController::class)->group(function () {
    Route::get('/tarefas', 'listarTarefas');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

