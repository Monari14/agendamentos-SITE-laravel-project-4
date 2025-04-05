@extends('layouts.app')

@section('content')
@include('partials.navDash')
<div class="containerDash">
    @if (isset($error))
        {{ $error }}
        <a href="/dashboard/novo-agendamento">Faça um agendamento agora</a>
    @else
        <table class="table table-striped">
            <h1>Meus agendamentos</h1>

            <a href="/dashboard/novo-agendamento/">Faça um novo agendamento</a>

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
                        <td>
                        <form action="{{ route('delete_agendamentos', ['id' => $agendamento->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
