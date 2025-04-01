@extends('layouts.app')

@section('content')
@include('partials.navDash')

    <div class="container">
    <h2>Bem vindo(a) à Dashboard, @ {{ $username }}!</h2>
    <br><br>
        <p>
            <a href="/dashboard/novo-agendamento">Faça um agendamento agora</a>.
        </p>
    </div>
@endsection
