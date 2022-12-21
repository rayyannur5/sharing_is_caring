@php
    if (!isset($_SESSION)) {
        session_start();
    }
@endphp

@extends('layouts/main')

@section('navbar')
    @include('partials/navbar')
@endsection

@section('container')
    <div class="container-fluid mt-5">
        <!-- <div class="hero"> -->
        <!-- <img src="assets/img/Rectangle 7.svg" alt="hero" /> -->
        <!-- </div> -->
        <div class="mb-5 d-flex flex-column justify-content-center align-items-center" style="height: 300px; background-image: url(assets/img/Rectangle\ 7.svg); background-size: cover">
            <h2 class="fw-bold text-light mb-4">Cari Donasi</h2>
            <div class="input-group w-50">
                <input class="form-control rounded-pill shadow" style="height: 50px" type="text" placeholder="Ketik disini" aria-label="Ketik disini" />
                <button class="btn btn-dark rounded-pill ms-3 border-0 shadow" style="background-color: #185fa9; width: 70px" type="submit">Cari</button>
            </div>
        </div>

        <!---- Header-section End ---->

        <!---- Donasislides-section Start ---->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Panti Asuhan Melati</h5>
                        <p class="card-text">Panti asuhan melati mengasuh anak-anak yang tidak mampu membiayai sekolah, donasi anda akan disalurkan untuk kelangsungan panti asuhan tersebut.</p>
                        <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Korban Gunung Merapi</h5>
                        <p class="card-text">
                            Tragedi meletusnya gunung merapi yang telah terjadi beberapa hari yang lalu tentunya memakan banyak korban, donasi kalian akan disalurkan kepada korban gunung merapi.
                        </p>
                        <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donasiteratas-section Start -->
        <div class="container">
            <h5 class="mt-3 mb-3">Donasi Teratas</h5>
            <div class="row">
                @foreach ($donasis as $donasi)
                    <div class="col-lg-4 d-flex justify-content-center">
                        <a href="/donasi/{{ $donasi['id'] }}">
                            <div class="card border-0" style="width: 18rem; height: 28rem; background-color: transparent">
                                <img src="assets/img/panti1donasi.jpg" class="card-img-top rounded-0" alt="card-panti1" />
                                <div class="card-body p-0">
                                    <h5 class="card-title mt-3">{{ $donasi['title'] }}</h5>
                                    <p class="card-text">Sudahkah berdonasi hari ini?</p>
                                    <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 d-flex justify-content-center">
                    <div class="card border-0" style="width: 18rem; height: 28rem; background-color: transparent">
                        <img src="assets/img/Merapi1donasi.png" class="card-img-top rounded-0" alt="card-merapi" />
                        <div class="card-body p-0">
                            <h5 class="card-title mt-3">Donasi Korban Gunung Merapi</h5>
                            <p class="card-text">Sudahkah berdonasi hari ini?</p>
                            <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="card border-0" style="width: 18rem; height: 28rem; background-color: transparent">
                        <img src="assets/img/panti2donasi.png" class="card-img-top rounded-0" alt="card-panti2" />
                        <div class="card-body p-0">
                            <h5 class="card-title mt-3">Panti Asuhan Kasih Sayang</h5>
                            <p class="card-text">Sudahkah berdonasi hari ini?</p>
                            <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                        </div>
                    </div>
                </div> --}}
            </div>

            <h5 class="mt-3 mb-3">Donasi Disekitar Anda</h5>

            <div class="row">
                @foreach ($donasis as $donasi)
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card border-0" style="width: 18rem; height: 28rem; background-color: transparent">
                            <img src="assets/img/panti1donasi.jpg" class="card-img-top rounded-0" alt="card-panti1" />
                            <div class="card-body p-0">
                                <h5 class="card-title mt-3">{{ $donasi['title'] }}</h5>
                                <p class="card-text">Sudahkah berdonasi hari ini?</p>
                                <a href="#" class="btn btn-outline-dark me-2 rounded-pill">DONASI</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row box shadow-lg" style="background-color: #d26321">
                <div class="col-6 d-flex justify-content-center">
                    <img src="assets/img/picbuatdonasi.png" alt="" />
                </div>
                <div class="col-6 ps-5 pe-5 d-flex flex-column justify-content-center text-light">
                    <h2 class="fw-light">Disekitar anda butuh bantuan? Buat donasi sekarang</h2>
                    <a href="{{ url('/donasi/add') }}" class="btn btn-outline-light w-25 rounded-pill">Donasi</a>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @include('partials/footer')
    @endsection
