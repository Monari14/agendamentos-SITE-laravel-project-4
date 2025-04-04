@extends('layouts.app')

@section('content')
@include('partials.navDash')

    <div class="containerDash">
    <h2>Bem vindo(a) à Dashboard, @ {{ $username }}!</h2>
    <br><br>
    @if ($agendamentos->isEmpty())
        <p>
            Você ainda não possui agendamentos.
        </p>
        <p>
            <a href="/dashboard/novo-agendamento">Faça um agendamento agora</a>.
        </p>
    @else
        <p>
            Você possui {{ $agendamentos->count() }} agendamentos.
        </p>
        <p>
            <a href="/dashboard/novo-agendamento">Faça um novo agendamento</a>.
        </p>
    @endif
@endsection
