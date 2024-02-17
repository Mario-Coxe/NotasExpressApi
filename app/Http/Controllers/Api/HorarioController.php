<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horarios;

class HorarioController extends Controller
{
    public function show($team_id, $class_id)
    {
        $schedules = Horarios::where([
            'team_id' => $team_id,
            'class_id' => $class_id,
        ])
            ->with('disciplinas')
            ->with('team')
            ->with('turmas')
            ->get();

        if ($schedules->count() > 0) {
            return response()->json(['message' => 'Horários encontrados', 'schedules' => $schedules], 200);
        } else {
            return response()->json(['message' => 'Horários não encontrados'], 404);
        }
    }
}