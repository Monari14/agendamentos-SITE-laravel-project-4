<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'emailUser' => 'required',
                'senha'         => 'required',
            ]);

            $emailUser = $request->input('emailUser');
            $senha         = $request->input('senha');

            if (filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
                $user = DB::table('users')->where('email', $emailUser)->first();
            } else {
                $user = DB::table('users')->where('username', $emailUser)->first();
            }

            if ($user && Hash::check($senha, $user->senha)) {
                Session::put('user_id', $user->id);
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('signin')->withErrors(['signin' => 'E-mail ou senha incorretos!']);
            }
        }

        return view('pages.signin');
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required|unique:users,username',
                'email'    => 'required|email|unique:users,email',
                'senha'    => 'required|min:6',
            ]);

            DB::table('users')->insert([
                'username' => $request->input('username'),
                'email'    => $request->input('email'),
                'senha'    => Hash::make($request->input('senha')),
            ]);

            return view('dashboard.dash');
        }

        return view('pages.signup');
    }

    public function dashboard()
    {
        // Verificar se o usuário está autenticado
        if (!session('user_id')) {
            return redirect()->route('signin');
        }

        // Obter o usuário usando DB
        $user = DB::table('users')->where('id', session('user_id'))->first();
        $username = DB::table('users')->where('id', session('user_id'))->value('username');
        if (!$user) {
            return redirect()->route('signin');
        }
        return view('dashboard.dash', ['user' => $user, 'username' => $username]);
    }

    public function logout()
    {
        Session::flush();

        return redirect()->route('logout');
    }
}
