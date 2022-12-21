@php
    if (!isset($_SESSION['token'])) {
        return view('login', [
            'title' => 'Login',
            'info' => 'unset',
        ]);
    }
@endphp

@extends('layouts/main')
@section('navbar')
    @include('partials/navbar')
@endsection
@section('container')
    <div class="container mt-5">
        <br>
        <div class="row">
            <div class="col-8">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Donasi</th>
                        <th>Nominal</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                    @foreach ($donasi as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['donasi_id']['title'] }}</td>
                            <td>{{ $item['nominal'] }}</td>
                            <td>{{ $item['metode'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-4">

                <h3 class="mt-5">{{ $name }}</h3>
                <h5>{{ $phone }}</h5>
                <h5>{{ $email }} </h5>
                <a href="{{ url('/user/logout') }}">
                    <button type="button" class="btn btn-danger">Log out</button>
                </a>
                <a href="{{ url('/update') }}">
                    <button type="button" class="btn btn-primary">Edit Profile</button>
                </a>
            </div>
        </div>
    </div>
@endsection
