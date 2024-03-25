<?php

namespace App\Exceptions\Tarefas;

class FalhaExcluirTarefaIdNumericoMissingException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao excluir tarefa, o id não é um numeral!');
    }
}
