<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Check if the user is logged
        // Verifica se o usuário está logado
        if (!session('user_id')) {
            return redirect()->route('signin');
        }

        // Search for the user in the database
        // Busca o usuário no banco de dados
        $user = DB::table('users')->where('id', session('user_id'))->first();
        // Get the username || Pega o nome de usuário
        $username = $user->username ?? 'Usuário';

        // Check if the user exists
        // Verifica se o usuário existe
        if (!$user) {
            return redirect()->route('signin');
        }

        // Fetch the user's appointments
        // Busca os agendamentos do usuário
        $agendamentos = DB::table('agendamentos')
            ->where('user_id', session('user_id'))
            ->get();


        // Return the view with the user, username, and appointments
        // Retorna a view com o usuário, nome de usuário e agendamentos
        return view('dashboard.dash', [
            'user' => $user,
            'username' => $username,
            'agendamentos' => $agendamentos,
        ]);
    }

    public function novo_agendamento(Request $request)
    {
        // Verifica se o usuário está logado
        if (!session('user_id')) {
            return redirect()->route('signin');
        }

        if ($request->isMethod('post')) {
            // Valida os dados da requisição
            $request->validate([
                'telefone' => 'required',
                'data'     => 'required|date',
                'hora'     => 'required|date_format:H:i',
                'quadra'   => 'required',
            ]);

            try {
                // Insere o novo agendamento no banco de dados
                DB::table('agendamentos')->insert([
                    'user_id'  => session('user_id'),
                    'telefone' => $request->input('telefone'),
                    'data'     => $request->input('data'),
                    'hora'     => $request->input('hora'),
                    'quadra'   => $request->input('quadra'),
                ]);

                // Redireciona para o dashboard com mensagem de sucesso
                return redirect()->route('dashboard')->with('sucesso', 'Agendamento realizado com sucesso!');
            } catch (\Exception $e) {
                // Redireciona de volta com mensagem de erro
                return redirect()->back()->with('error', 'Erro ao realizar o agendamento. Tente novamente.');
            }
        }

        // Retorna a view de novo agendamento
        return view('dashboard.novo_agendamento');
    }
}
