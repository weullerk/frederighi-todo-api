<?php

namespace App\Exceptions\Tarefas;

class FalhaExibirTarefaNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao retornar tarefa, não foi encontrado uma tarefa para o id fornecido!');
    }
}
