<?php

namespace App\Exceptions\Tarefas;

class FalhaCadastrarTarefaException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao cadastrar tarefa, um erro interno ocorreu!');
    }
}
