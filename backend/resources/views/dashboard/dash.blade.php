@extends('layouts.app')

@include('partials.navDash')
@section('content')
    <div class="container">
        <h2>Bem vindo à Dashboard, @ {{$username}}!</h2>
        <br><br>
    </div>
@endsection
