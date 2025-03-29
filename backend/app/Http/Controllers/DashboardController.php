<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function novo_agendamento(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'telefone' => 'required',
                'data'     => 'required|date',
                'hora'     => 'required|date_format:H:i',
                'quadra'   => 'required',
            ]);

            DB::table('agendamentos')->insert([
                'user_id' => session('user_id'),
                'telefone' => $request->input('telefone'),
                'data'    => $request->input('data'),
                'hora'    => $request->input('hora'),
                'quadra'    => $request->input('quadra'),
            ]);
            $user = DB::table('users')->where('id', session('user_id'))->first();
            $username = DB::table('users')->where('id', session('user_id'))->value('username');
            return view('dashboard.dash', ['user' => $user, 'username' => $username]);
        }

        return view('dashboard.novo_agendamento');
    }
}
