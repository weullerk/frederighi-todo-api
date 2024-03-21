<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TarefasController::class)->group(function () {
    Route::get('/tarefas', 'listarTarefas');
});

