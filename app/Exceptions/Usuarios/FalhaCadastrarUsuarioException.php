<?php

namespace App\Exceptions\Usuarios;

class FalhaCadastrarUsuarioException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Falha ao cadastrar usuário, um erro interno ocorreu!');
    }
}
