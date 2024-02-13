<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendarios;

class CalenderController extends Controller
{
    public function getCalenderByTeamIdAndClass($team_id, $class_id)
    {
        $calender = Calendarios::where([
            'team_id' => $team_id,
            'class_id' => $class_id,
        ])->get();
        if ($calender) {
            return response()->json(['message' => 'Calendarios', 'calender' => $calender], 200);
        } else {
            return response()->json(['message' => 'Calendarios não encontrado'], 404);
        }
    }
}