@php
    if (!isset($_SESSION)) {
        session_start();
    }
@endphp

@extends('layouts/main')

@section('navbar')
    @include('partials/navbar')
@endsection
<div class="d-grid">
    <h1 class="text-center fw-bold">Untuk dapat membuka Fitur ini,</h1>
    <h1 class="text-center fw-bold">Login terlebih dahulu</h1>
</div>
<center>
    <a href="{{ url('/login') }}" class="btn btn-outline-dark me-2 rounded-pill mt-2 mb-5" type="button">Login</a>
</center>
@section('container')
@endsection

@section('footer')
    @include('partials/footer')
@endsection
