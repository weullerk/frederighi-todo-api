<?php

namespace App\Exceptions\Tarefas;

class FalhaExcluirTarefaException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao excluir tarefa, um erro interno ocorreu!');
    }
}
