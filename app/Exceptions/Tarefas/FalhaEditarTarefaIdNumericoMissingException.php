<?php

namespace App\Exceptions\Tarefas;

class FalhaEditarTarefaIdNumericoMissingException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao editar tarefa, o id não é um numeral!');
    }
}
