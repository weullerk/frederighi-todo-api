<?php

namespace App\Services;

use App\Exceptions\Tarefas\FalhaCadastrarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaEditarTarefaNotFoundException;
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

    /**
     * @throws FalhaEditarTarefaIdNumericoMissingException
     * @throws FalhaEditarTarefaNotFoundException
     * @throws FalhaEditarTarefaException
     */
    public function editar($id, $data) {
        if (!is_numeric($id)) {
            throw new FalhaEditarTarefaIdNumericoMissingException();
        }

        $tarefa = Tarefa::find($id);

        if(is_null($tarefa)) {
            throw new FalhaEditarTarefaNotFoundException();
        }

        $tarefa->descricao = $data["descricao"];

        if ($tarefa->save()) {
            return true;
        } else {
            throw new FalhaEditarTarefaException();
        }
    }
}
