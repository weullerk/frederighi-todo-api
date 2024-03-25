<?php

namespace App\Http\Controllers;

use App\Exceptions\Tarefas\FalhaCadastrarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaException;
use App\Exceptions\Tarefas\FalhaEditarTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaEditarTarefaNotFoundException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaExcluirTarefaNotFoundException;
use App\Exceptions\Tarefas\FalhaExibirTarefaIdNumericoMissingException;
use App\Exceptions\Tarefas\FalhaExibirTarefaNotFoundException;
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
                $tarefaService = new TarefaService();
                $tarefaService->cadastrar($formData, auth()->user()->id);

                return response()->json(['message' => 'Tarefa cadastrada com sucesso!']);
            } catch (FalhaCadastrarTarefaException|Exception $e) {
                return response()->json(['message' => $e->getMessage()]);
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
                $tarefaService = new TarefaService();
                $tarefaService->editar($id, $formData);

                return response()->json(['message' => 'Tarefa editada com sucesso!']);
            } catch (
                FalhaEditarTarefaIdNumericoMissingException|
                FalhaEditarTarefaNotFoundException|
                FalhaEditarTarefaException|
                Exception $e
            ) {
                return response()->json(['message' => $e->getMessage()]);
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
            $tarefaService = new TarefaService();
            $tarefaService->excluir($id);

            return response()->json(['message' => 'Tarefa excluida com sucesso!']);
        } catch (
            FalhaExcluirTarefaIdNumericoMissingException|
            FalhaExcluirTarefaNotFoundException|
            FalhaExcluirTarefaException|
            Exception $e
        ) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function exibirTarefa($id, Request $request)
    {
        try {
            $tarefaService = new TarefaService();
            $tarefa = $tarefaService->exibir($id);

            return response()->json(['tarefa' => $tarefa]);
        } catch (
            FalhaExibirTarefaIdNumericoMissingException|
            FalhaExibirTarefaNotFoundException|
            Exception $e
        ) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
