@extends('layouts.app')

@section('content')
@include('partials.navDash')
<div class="container">
    @if (isset($error))
        <div class="alert alert-warning">
            {{ $error }}
        </div>
    @else
        <table class="table table-striped">
            <h1>Meus agendamentos</h1>

            <a href="/dashboard/novo-agendamento/">Novo agendamento</a>

            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Quadra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                    <tr>
                        <td>{{ $agendamento->data }}</td>
                        <td>{{ $agendamento->hora }}</td>
                        <td>{{ $agendamento->quadra }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
