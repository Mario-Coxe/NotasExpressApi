<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Get a student by team_id and telefone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByTeamIdAndTelefone($team_id, $telefone)
    {
        // Busca um aluno com base no team_id e telefone
        $student = Aluno::where([
            'team_id' => $team_id,
            'telefone' => $telefone,
        ])->first();
    
        // Verifica se o aluno foi encontrado
        if ($student) {
            // Retorna uma resposta JSON com os dados do aluno
            return response()->json(['message' => 'Aluno encontrado', 'student' => $student], 200);
        } else {
            // Retorna uma resposta JSON indicando que o aluno não foi encontrado
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
    }
    
}
