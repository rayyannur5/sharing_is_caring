@php
    if(!isset($_SESSION['token'])){
        return view('login', [
            'title' => 'Login',
            'info' => 'unset'
        ]);
    }
@endphp

@extends('layouts/main')
@section('navbar')
    @include('partials/navbar')
@endsection
@section('container')
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <h3>{{ $phone }}</h3>
    <h3>{{ $email }} </h3>
    <a href="{{ url('/user/logout') }}">
        <button type="button" class="btn btn-danger">Log out</button>
    </a>
    <a href="{{ url('/update') }}">
        <button type="button" class="btn btn-primary">Edit Profile</button>
    </a>
@endsection
