<?php

namespace App\Exceptions\Tarefas;

class FalhaExibirTarefaIdNumericoMissingException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao retornar tarefa, o id não é um numeral!');
    }
}
