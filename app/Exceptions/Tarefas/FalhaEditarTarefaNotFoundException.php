<?php

namespace App\Exceptions\Tarefas;

class FalhaEditarTarefaNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao editar tarefa, não foi encontrado uma tarefa para o id fornecido!');
    }
}
