@php
    session_start();
@endphp

@extends('layouts/main')

@section('navbar')
    @include('partials/navbar')
@endsection



@section('container')
    <link rel="stylesheet" href="assets/css/carousel.css">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: linear-gradient(to top, rgb(209, 107, 28) 0%, rgba(2, 36, 91, 0) 100%), url('assets/img/carousel1.jpeg') center center no-repeat; background-size: cover">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> -->

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="fw-bold">Bencana Banjir</h1>
                        <p>Ayo bantu saudara kita untuk korban bencana banjir di Indonesia. sedikit bantuan anda sangat berarti bagi korban.</p>
                        <p>
                            <a class="btn btn-lg btn-light rounded-pill shadow-lg" style="width: 200px" href="/donasi">Donasi</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background: linear-gradient(to top, rgb(209, 107, 28) 0%, rgba(2, 36, 91, 0) 100%), url('assets/img/carousel2.jpg') center center no-repeat; background-size: cover">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> -->

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="fw-bold">Santuni Anak Yatim Piatu</h1>
                        <p>beberapa panti asuhan dekat anda membutuhkan santunan anda. Ayo terus sebar kebaikan untuk orang-orang sekitar</p>
                        <p><a class="btn btn-lg btn-light rounded-pill shadow-lg" style="width: 200px" href="/donasi">Donasi</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background: linear-gradient(to top, rgb(209, 107, 28) 0%, rgba(2, 36, 91, 0) 100%), url('assets/img/carousel3.jpg') center center no-repeat; background-size: cover">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> -->

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Buat Kelompok Anda</h1>
                        <p>Bagi kalian yang ingin melakukan iuran pembayaran, kami menyediakan fitur iuran. Lakukan iuran dengan lebih efisien</p>
                        <p><a class="btn btn-lg btn-light rounded-pill shadow-lg" style="width: 200px" href="/login">Daftar Sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel End -->

    <div class="container text-center">
        <h1>Program Kita</h1>
        <p class="mt-3">
            Beberapa fitur unggulan dari kami untuk anda. Untuk terus menuju kebaikan dengan berdonasi. dan untuk anda yang ingin melakukan iuran dengan kelompok anda dengan tujuan tertentu, disini kami
            memberikan pelayanan tersebut
        </p>

        <div class="row mt-4 mb-5">
            <div class="col-md-6 mt-3 d-flex justify-content-center">
                <div class="card shadow-lg" style="border: none; width: 18rem; border-radius: 13px; border-top-right-radius: 50px">
                    <img src="assets/img/Media.png" class="card-img-top align-self-center" alt="..." />
                    <div class="card-body text-start text-light" style="background-color: #91b4c7; border-radius: 13px; border-top-left-radius: 0; border-top-right-radius: 0">
                        <h5 class="card-title fw-bold mb-4">Donasi</h5>

                        <a href="/donasi" class="text-decoration-none text-light">See More ></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 d-flex justify-content-center">
                <div class="card shadow-lg" style="border: none; width: 18rem; border-radius: 13px; border-top-right-radius: 50px">
                    <img src="assets/img/Rectangle.png" class="card-img-top align-self-center" alt="..." />
                    <div class="card-body text-start text-light border" style="background-color: #91b4c7; border-radius: 13px; border-top-left-radius: 0; border-top-right-radius: 0">
                        <h5 class="card-title fw-bold mb-4">Iuran</h5>
                        <a href="" class="text-decoration-none text-light">See More ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-md-4 d-flex flex-column justify-content-center">
                    <h1 class="fw-semibold mb-3">Donasi Mulai dari Sekitar Anda</h1>
                    <p>Banyak orang disekitar anda yang membutuhkan bantuan anda. Coba lihat beberapa orang yang membutuhkan anda. Mulailah berdonasi</p>
                    <a href="/donasi" class="btn text-light rounded-pill mt-3 shadow-lg" style="width: 160px; background-color: #185fa9">Donasi</a>
                </div>
                <div class="col-md-8 d-flex justify-content-center">
                    <img src="assets/img/donasipicture.png" class="mt-3 mb-3 w-75" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row box shadow-lg" style="background-image: url('assets/img/tangan.png')">
            <div class="col-md-6"></div>
            <div class="col-md-6 ps-5 d-flex flex-column justify-content-center">
                <h2>Buat Kelompok dan Mulailah Lakukan Pembayaran dengan Teratur</h2>
                <a href="" class="btn btn-outline-dark w-25 rounded-pill">Iuran</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials/footer')
@endsection
