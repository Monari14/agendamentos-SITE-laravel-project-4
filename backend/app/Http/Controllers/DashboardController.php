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
        $username = DB::table('users')->where('id', session('user_id'))->value('username');
        if (!$user) {
            return redirect()->route('signin');
        }
        return view('dashboard.dash', ['user' => $user, 'username' => $username]);
    }

    public function novo_agendamento(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the request data
            // Valida os dados da requisição
            $request->validate([
                'telefone' => 'required',
                'data'     => 'required|date',
                'hora'     => 'required|date_format:H:i',
                'quadra'   => 'required',
            ]);
            // Insert the new schedule into the database
            // Insere o novo agendamento no banco de dados
            DB::table('agendamentos')->insert([
                'user_id' => session('user_id'),
                'telefone' => $request->input('telefone'),
                'data'    => $request->input('data'),
                'hora'    => $request->input('hora'),
                'quadra'    => $request->input('quadra'),
            ]);
            // Redirect to the dashboard after successful insertion
            // Redireciona para o dashboard após a inserção bem-sucedida
            $user = DB::table('users')->where('id', session('user_id'))->first();
            $username = DB::table('users')->where('id', session('user_id'))->value('username');
            return view('dashboard.dash', ['user' => $user, 'username' => $username]);
        }
        // If it was not possible to make the appointment, return to the same page
        // Se não foi possível fazer o agendamento, retorna para a mesma página
        return view('dashboard.novo_agendamento');
    }
}
