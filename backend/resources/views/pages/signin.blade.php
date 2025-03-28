@extends('layouts.app')

@include('partials.navPublic')
@section('content')
<title>Sign In</title>
    <div class="container">
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <h1>Sign In</h1>
            <input type="text" name="emailUser" id="emailUser" placeholder="Nome de usuário ou E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button type="reset">Reset</button>
        </form>
    </div>
@endsection

