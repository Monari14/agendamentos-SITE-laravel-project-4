@extends('layouts.app')

@section('content')
    <center>
        <h1>Dashboard</h1>
        <a href="{{ url('/logout') }}">Logout</a>
        <br><br>
    </center>
@endsection
