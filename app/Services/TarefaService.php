<?php

namespace App\Services;

use App\Exceptions\Tarefas\FalhaCadastrarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaEditarTarefaNotFoundException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaNotFoundException;
use App\Exceptions\Tarefas\FalhaExibirTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaExibirTarefaNotFoundException;
use App\Models\Tarefa;

class TarefaService
{
    public function listarTarefas() {
        return Tarefa::orderByDesc('id')->get();
    }

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

    /**
     * @throws FalhaExcluirTarefaException
     * @throws FalhaExcluirTarefaNotFoundException
     * @throws FalhaExcluirTarefaIdNumericoMissingException
     */
    public function excluir($id) {
        if (!is_numeric($id)) {
            throw new FalhaExcluirTarefaIdNumericoMissingException();
        }

        $tarefa = Tarefa::find($id);

        if(is_null($tarefa)) {
            throw new FalhaExcluirTarefaNotFoundException();
        }

        if ($tarefa->delete()) {
            return true;
        } else {
            throw new FalhaExcluirTarefaException();
        }
    }

    /**
     * @throws FalhaExibirTarefaNotFoundException
     * @throws FalhaExibirTarefaIdNumericoMissingException
     */
    public function exibir($id) {
        if (!is_numeric($id)) {
            throw new FalhaExibirTarefaIdNumericoMissingException();
        }

        $tarefa = Tarefa::find($id);

        if(is_null($tarefa)) {
            throw new FalhaExibirTarefaNotFoundException();
        }

        return $tarefa;
    }
}
