@extends('layouts.app')

@include('partials.navPublic')
@section('content')
<title>Sign Up</title>
    <center>
        <h1>Sign Up</h1>
        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <input type="text" name="username" id="username" placeholder="Nome de usuário" required>
            <input type="text" name="email" id="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button type="reset">Reset</button>
        </form>
    </center>
@endsection

@include('partials.footer')
