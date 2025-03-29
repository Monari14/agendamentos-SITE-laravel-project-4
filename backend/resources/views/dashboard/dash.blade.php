@extends('layouts.app')

@include('partials.navDash')
@section('content')
    <div class="container">
        <h2>Bem vindo à Dashboard, @ {{$username}}!</h2>
        <br><br>

        @if (isset($agendamentos) && $agendamentos->isNotEmpty())
            <ul>
                @foreach ($agendamentos as $agendamento)
                    <li>
                        Data: {{ $agendamento->data }} - Hora: {{ $agendamento->hora }} - Quadra: {{ $agendamento->quadra }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>{{ $error ?? 'Nenhum agendamento encontrado.' }}</p>
        @endif
    </div>
@endsection
