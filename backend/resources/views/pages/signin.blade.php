@extends('layouts.app')

@include('partials.navPublic')
@section('content')
<title>Sign In</title>
    <center>
        <h1>Sign In</h1>
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <input type="text" name="emailUser" id="emailUser" placeholder="Nome de usuário ou E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button type="reset">Reset</button>
        </form>
    </center>
@endsection

@include('partials.footer')
