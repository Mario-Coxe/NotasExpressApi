<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Alunos;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Get a student by team_id and telefone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByTeamIdAndPhone($team_id, $phone_number)
    {
        $student = Alunos::where([
            'team_id' => $team_id,
            'phone_number' => $phone_number,
        ])->first();
        if ($student) {
            return response()->json(['message' => 'Aluno encontrado', 'student' => $student], 200);
        } else {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
    }
    
}
