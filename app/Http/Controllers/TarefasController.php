<?php

namespace App\Http\Controllers;

use App\Exceptions\Tarefas\FalhaCadastrarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaEditarTarefaNotFoundException;
use App\Exceptions\Usuarios\FalhaCadastrarUsuarioException;
use App\Services\TarefaService;
use App\Services\UsuarioService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarefasController
{
    public function listarTarefas(Request $request) {
        return response()->json(['nome' => 'tarefa']);
    }

    public function cadastrarTarefa(Request $request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'descricao' => 'required',
        ]);

        if (!$validator->fails()) {
            try {
                $usuarioService = new TarefaService();
                $usuarioService->cadastrar($formData, auth()->user()->id);

                return response()->json(['message' => 'Tarefa cadastrada com sucesso!']);
            } catch (FalhaCadastrarTarefaException|Exception $e) {
                return response()->json([ 'message' => $e->getMessage()]);
            }
        } else {
            return response()->json([
                'message' =>
                    'Falha ao cadastrar tarefa, os dados necessários não foram preenchidos ou estão incorretos!'
            ]);
        }
    }

    public function editarTarefa($id, Request $request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'descricao' => 'required',
        ]);

        if (!$validator->fails()) {
            try {
                $usuarioService = new TarefaService();
                $usuarioService->editar($id, $formData);

                return response()->json(['message' => 'Tarefa editada com sucesso!']);
            } catch (FalhaEditarTarefaIdNumericoMissingException|FalhaEditarTarefaNotFoundException|Exception $e) {
                return response()->json([ 'message' => $e->getMessage()]);
            }
        } else {
            return response()->json([
                'message' =>
                    'Falha ao cadastrar tarefa, os dados necessários não foram preenchidos ou estão incorretos!'
            ]);
        }
    }

    public function excluirTarefa($id, Request $request) {
        try {
            $usuarioService = new TarefaService();
            $usuarioService->excluir($id);

            return response()->json(['message' => 'Tarefa excluida com sucesso!']);
        } catch (FalhaEditarTarefaIdNumericoMissingException|FalhaEditarTarefaNotFoundException|Exception $e) {
            return response()->json([ 'message' => $e->getMessage()]);
        }
    }
}
