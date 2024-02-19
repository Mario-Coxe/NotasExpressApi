<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professores;

class ProfessorController extends Controller
{
    public function show($team_id, $responsible_professor_id)
    {
        $professor = Professores::where([
            'team_id' => $team_id,
            'id' => $responsible_professor_id,
        ])
            ->get();

        if ($professor->count() > 0) {
            return response()->json(['message' => 'Professor encontrados', 'professor' => $professor], 200);
        } else {
            return response()->json(['message' => 'Professor não encontrados'], 404);
        }
    }
}