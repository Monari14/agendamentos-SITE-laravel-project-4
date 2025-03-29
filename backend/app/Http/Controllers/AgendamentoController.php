<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;
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
        // Log os valores recebidos
        \Log::info("Data recebida: $data, Hora recebida: $hora");

        // Consulta ao banco de dados
        $quadrasIndisponiveis = Agendamento::where('data', $data) // Usa o formato 'DD-MM-YYYY' diretamente
            ->where('hora', $hora)
            ->pluck('quadra')
            ->toArray();

        // Log o resultado da consulta
        \Log::info("Quadras indisponíveis: " . json_encode($quadrasIndisponiveis));

        return response()->json($quadrasIndisponiveis);
    }
    public function meus_agendamentos()
    {
        // Verifica se o usuário está logado
        if (!session('user_id')) {
            return redirect()->route('signin');
        }

        // Busca os agendamentos do usuário
        $agendamentos = DB::table('agendamentos')
            ->where('user_id', session('user_id'))
            ->get();

        // Verifica se existem agendamentos
        if ($agendamentos->isEmpty()) {
            return view('dashboard.meus_agendamentos', [
                'error' => 'Você não possui agendamentos.'
            ]);
        }

        // Retorna a view com os agendamentos
        return view('dashboard.meus_agendamentos', [
            'agendamentos' => $agendamentos
        ]);
    }
}
