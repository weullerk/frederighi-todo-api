<?php

namespace App\Services;

use App\Exceptions\Usuarios\FalhaCadastrarUsuarioException;
use App\Models\User;

class UsuarioService
{
    /**
     * @throws FalhaCadastrarUsuarioException
     */
    public function cadastrar($data)
    {
        $userData = ['name' => $data['nome'], 'email' => $data['email'], 'password' => $data['senha']];

        if (User::create($userData)) {
            return true;
        } else {
            throw new FalhaCadastrarUsuarioException();
        }
    }

    public function verificarEmail($email)
    {
        return User::where('email', $email);
    }
}
