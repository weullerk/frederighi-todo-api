<?php

namespace App\Exceptions\Tarefas;

class FalhaEditarTarefaException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao editar tarefa, um erro interno ocorreu!');
    }
}
