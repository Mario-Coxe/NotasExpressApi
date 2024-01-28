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
            ->get();

        if ($events->count() > 0) {
            return response()->json(['message' => 'Eventos encontrados', 'events' => $events], 200);
        } else {
            return response()->json(['message' => 'Eventos não encontrados'], 404);
        }
    }


    public function search($team_id, $name = null)
    {
        if ($name === null || $name === "") {
            $events = Eventos::where('team_id', $team_id)
                ->where('is_active', 1)
                ->get();

            $response = [
                'status' => 'success',
                'message' => 'Todos os eventos',
                'data' => $events,
            ];
        } else {
            $events = Eventos::where('theme', 'like', '%' . $name . '%')->latest()->get();

            if ($events->isEmpty()) {
                $response = [
                    'status' => 'failed',
                    'message' => 'Evento não encontrado!',
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Evento encontrado',
                    'data' => $events,
                ];
            }
        }

        return response()->json($response, 200);
    }
}
