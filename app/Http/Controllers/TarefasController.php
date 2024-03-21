<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefasController
{
    public function listarTarefas(Request $request) {
        return response()->json(['nome' => 'tarefa']);
    }
}
