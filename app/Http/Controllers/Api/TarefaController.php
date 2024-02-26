<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefas;
use App\Models\Disciplinas;

class TarefaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'professor_id' => 'required',
            'subject_id' => 'required',
            'due_date' => 'required|date',
            'description' => 'required',
        ]);

        $tarefa = Tarefas::create($request->all());

        return response()->json(['message' => 'Tarefa criada com sucesso', 'data' => $tarefa], 201);
    }


    public function index()
    {
        $tarefas = Tarefas::all();

        return response()->json(['data' => $tarefas], 200);
    }

    public function getByTurma($turmaId)
    {
        $tarefas = Tarefas::where('class_id', $turmaId)->get();
        $tarefasPorDisciplina = [];

        foreach ($tarefas as $tarefa) {
            $disciplina = $tarefa->disciplinas->name;

            if (!array_key_exists($disciplina, $tarefasPorDisciplina)) {
                $tarefasPorDisciplina[$disciplina] = [
                    'disciplina' => $disciplina,
                    'tarefas' => []
                ];
            }

       
            $dueDate = new \DateTime($tarefa->due_date);

            $tarefasPorDisciplina[$disciplina]['tarefas'][] = [
                'id' => $tarefa->id,
                'descricao' => $tarefa->description,
                'dataEntrega' => $dueDate->format('d/m/Y')
            ];
        }

        return response()->json(array_values($tarefasPorDisciplina), 200);
    }
}