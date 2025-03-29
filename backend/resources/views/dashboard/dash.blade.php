@extends('layouts.app')

@section('content')
@include('partials.navDash')

    <div class="container">
    <h2>Bem vindo(a) à Dashboard, @ {{ $username }}!</h2>
    <br><br>
    @if ($agendamentos->isNotEmpty())
        <p>
            Você tem {{ $agendamentos->count() }}
            {{ Str::plural('agendamento', $agendamentos->count()) }}.
            <a href="/dashboard/meus-agendamentos">Ver agora</a>.
        </p>
    @else
        <p>
            Nenhum agendamento encontrado.
            <a href="/dashboard/novo-agendamento">Faça um agendamento agora</a>.
        </p>
    @endif
    </div>
@endsection
