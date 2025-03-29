@extends('layouts.app')

@section('content')
    @include('partials.navDash')

    <!-- CSS do Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts do Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script> <!-- Tradução PT -->
    <div class="container">
        <form action="{{ route('dashboard/novo-agendamento') }}" method="POST">
            @csrf
            <h2>Novo Agendamento</h2>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>

            <label for="data">Data:</label>
            <div style="display: flex; align-items: center;">
                <input type="text" name="data" id="data" placeholder="Selecione a data" required style="opacity: 0; position: absolute;">
                <button type="button" id="calendarButton" style="background: none; border: none; cursor: pointer;">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" alt="Ícone de calendário" width="24" height="24">
                </button>
                <span id="selectedDate" style="margin-left: 10px; font-weight: bold;">Selecione uma data</span>
            </div>
            <label for="hora">Horário:</label>
            <select name="hora" id="hora">
            <option value="" disabled selected>Selecione a hora</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
            </select>

            <label for="quadra">Quadra:</label>
            <select name="quadra" id="quadra" required>
                <option value="" disabled selected>Selecione a quadra</option>
                <option value="Quadra 1">Quadra 1</option>
                <option value="Quadra 2">Quadra 2</option>
                <option value="Quadra 3">Quadra 3</option>
                <option value="Quadra 4">Quadra 4</option>
            </select>
            <button type="submit">Prosseguir</button>
            <button type="reset">Reset</button>
        </form>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
