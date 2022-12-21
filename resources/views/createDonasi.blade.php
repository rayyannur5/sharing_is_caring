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
    <section class="vh-100">
        <div class="container-fluid mt-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <form action="" method="POST">
                        {{ csrf_field() }}

                        <div class="mt-3 mb-3 pt-2">
                            <h1 class="text-center fw-bold mt-4 pt-2 mb-0">Buat Donasi</h1>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Judul Donasi</label>
                            <input type="text" name="title" id="form3Example3" class="form-control form-control-lg rounded-pill" placeholder="Ketik Judul Disini" />
                        </div>

                        <div class="form-outline mb-4">
                            <label for="comment">Deskripsi Donasi</label>
                            <textarea class="form-control rounded-5" rows="5" id="comment" name="desc" placeholder="Ketik Deskripsi Disini"></textarea>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Target (Rupiah)</label>
                            <input type="number" id="form3Example3" name="target" class="form-control form-control-lg rounded-pill" placeholder="" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Upload Dokumentasi</label>
                            <h1><input type="tel" id="form3Example3" class="form-control form-control-lg rounded-pill" placeholder="Klik Untuk Memilih File" /></h1>
                        </div>


                        <div class="d-grid gap-2 mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg me-2 rounded-pill" style="background-color: #185fa9">Buat Donasi</button></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('partials/footer')
@endsection
