<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
class AgendamentoController extends Controller
{
    public function getAgendamentos($data, $quadra)
    {
        // Filtra os agendamentos pela data e quadra
        $agendamentos = Agendamento::
            whereDate('data', $data)
            ->where('quadra', $quadra)
            ->pluck('hora')
            ->toArray();

        return response()->json($agendamentos);
    }

    public function getQuadrasIndisponiveis($data, $hora)
    {
        // Filtra os agendamentos pela data e hora
        $quadrasIndisponiveis = Agendamento::
            whereDate('data', $data)
            ->where('hora', $hora)
            ->pluck('quadra')
            ->toArray();

        return response()->json($quadrasIndisponiveis);
    }
}
