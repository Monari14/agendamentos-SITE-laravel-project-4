@extends('layouts.app')

@include('partials.navDash')
@section('content')
        <div class="container">
        <form action="{{ route('dashboard/novo-agendamento') }}" method="POST">
            @csrf
            <h2>Novo agendamento</h2>
            <input type="tel" id="telefone" name="telefone" placeholder="Telefone">
            <input type="date" name="data" id="data">
            <input type="time" name="hora" id="hora">
            <select name="quadra" id="quadra">
                <option value="Quadra 1">Quadra 1</option>
                <option value="Quadra 1">Quadra 2</option>
                <option value="Quadra 1">Quadra 3</option>
                <option value="Quadra 1">Quadra 4</option>
            </select>
            <button type="submit">Prosseguir</button>
            <button type="reset">Reset</button>
        </form>
    </div>
@endsection
