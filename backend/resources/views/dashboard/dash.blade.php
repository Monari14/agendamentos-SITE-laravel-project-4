@extends('layouts.app')

@section('content')
    <center>
        <h2>Bem vindo à Dashboard, @ {{$username}}!</h2>
        <a href="{{ url('/logout') }}">Logout</a>
        <br><br>
    </center>
@endsection
