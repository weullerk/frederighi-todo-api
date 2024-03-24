<?php

namespace App\Services;

use App\Exceptions\Tarefas\FalhaCadastrarTarefaException;
use App\Models\Tarefa;

class TarefaService
{
    /**
     * @throws FalhaCadastrarTarefaException
     */
    public function cadastrar($data, $userId) {
        $tarefa = new Tarefa();
        $tarefa->descricao = $data["descricao"];
        $tarefa->status = 'pendente';
        $tarefa->user_id = $userId;

        if ($tarefa->save()) {
            return true;
        } else {
            throw new FalhaCadastrarTarefaException();
        }
    }
}
