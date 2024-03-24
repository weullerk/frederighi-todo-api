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
        $userModel = new User();
        $userModel->name = $data['nome'];
        $userModel->email = $data['email'];
        $userModel->password = encrypt($data['senha']);

        if ($userModel->save()) {
            return true;
        } else {
            throw new FalhaCadastrarUsuarioException();
        }
    }
}
