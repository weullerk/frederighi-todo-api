<?php

namespace App\Exceptions\Tarefas;

class FalhaExcluirTarefaNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao excluir tarefa, não foi encontrado uma tarefa para o id fornecido!');
    }
}
