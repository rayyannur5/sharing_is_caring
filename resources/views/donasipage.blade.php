@extends('layouts/main')

@section('navbar')
    @include('partials/navbar')
@endsection

@section('container')
    <div class="container" style="margin-top: 100px">
        <h2 class="fw-bold mt-5">{{ $donasi['title'] }}</h2>
        <h6 class="fw-bold">Target : Rp {{ $donasi['target'] }}</h6>
        <h6 class="mt-2">{{ $donasi['desc'] }}</h6>
        <h6 class="fw-bold mt-2">Dokumentasi</h6>
        <div class="row mt-2">
            <img src="img/panti1donasi.jpg" alt="" class="img-fluid" style="height: 200px; width: 250px;">
            <img src="img/panti2donasi.png" alt="" class="img-fluid" style="height: 200px; width: 250px;">
            <img src="img/panti4donasi.jpg" alt="" class="img-fluid" style="height: 200px; width: 250px;">
        </div>
        <div class="row mt-4 mb-5">
            <img src="img/panti6donasi.jpg" alt="" class="img-fluid" style="height: 200px; width: 250px;">
            <img src="img/panti5donasi.jpeg" alt="" class="img-fluid" style="height: 200px; width: 250px;">
        </div>
        <a href="/donasi/{{ $donasi['id'] }}/bayar" class="btn btn-lg btn-outline-dark rounded-pill">Donasi</a>
    </div>
@endsection

@section('navbar')
    @include('partials/footer')
@endsection
