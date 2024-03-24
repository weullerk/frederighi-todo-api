<?php

namespace App\Http\Controllers;

use App\Exceptions\Usuarios\FalhaCadastrarUsuarioException;
use App\Services\UsuarioService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function cadastrar(Request $request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required,alpha_num'
        ]);

        if (!$validator->fails()) {
            try {
                $usuarioService = new UsuarioService();
                $usuarioService->cadastrar($formData);

                return response()->json(['message' => 'Cadastro realizado com sucesso!']);
            } catch (FalhaCadastrarUsuarioException|Exception $e) {
                return response()->json([ 'message' => $e->getMessage()]);
            }
        } else {
            return response()->json([
                'message' =>
                'Falha ao realizar cadastro, os dados necessários não foram preenchidos ou estão incorretos!'
            ]);
        }
    }

    public function verificarEmail(Request $request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'email' => 'required',
        ]);

        if (!$validator->fails()) {
            try {
                $usuarioService = new UsuarioService();
                $email = $usuarioService->verificarEmail($formData["email"]);

                if ($email->count()) {
                    return response()->json(['email' => 'true']);
                } else {
                    return response()->json(['email' => 'false']);

                }
            } catch (FalhaCadastrarUsuarioException|Exception $e) {
                return response()->json([ 'message' => $e->getMessage()]);
            }
        } else {
            return response()->json([
                'message' =>
                'Falha ao realizar cadastro, os dados necessários não foram preenchidos ou estão incorretos!'
            ]);
        }
    }
}
