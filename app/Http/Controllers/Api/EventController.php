<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eventos;

class EventController extends Controller
{
    public function show($team_id)
    {
        $events = Eventos::where('team_id', $team_id)
            ->where('is_active', 1)
            ->orderBy('data_time', 'desc')
            ->get();

        if ($events->count() > 0) {
            return response()->json(['message' => 'Eventos encontrados', 'events' => $events], 200);
        } else {
            return response()->json(['message' => 'Eventos não encontrados'], 404);
        }
    }

    public function search($team_id, $name = null)
    {
        $eventsQuery = Eventos::where('team_id', $team_id)->where('is_active', 1);

        if ($name !== null && trim($name) !== "") {
            $eventsQuery->where('theme', 'like', '%' . $name . '%');
        }

        $events = $eventsQuery->orderBy('data_time', 'desc')
            ->get();

        if ($events->isEmpty() && $name !== null) {
            return response()->json(['message' => 'Nenhum evento encontrado', 'events' => $events], 404);
        }

        return response()->json(['message' => 'Eventos encontrados', 'events' => $events], 200);
    }
}
