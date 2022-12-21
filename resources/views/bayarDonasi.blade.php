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
    <div class="container">

        <div class="d-grid">
            <h2 class="fw-bold">Pembayaran</h2>
            <h6>1. BNI - Rayyan Nur Fauzan - 1234567889</h6>
            <h6>2. BRI - Rayyan Nur Fauzan - 1234567890</h6>
            <h6>3. Gopay - Rayyan Nur Fauzan - 08123456789</h6>
            <h6>4. Link Aja - Rayyan Nur Fauzan - 08123456789</h6>
            <h6>5. ShopeePay - Rayyan Nur Fauzan - 08123456789</h6>
            <h6 class="mt-3">Prosedur Pembayaran :</h6>
            <h6>1. Lakukan pembayaran dengan beberapa pilihan diatas.</h6>
            <h6>2. Setelah melakukan proses transfer, jangan lupa foto/screenshot bukti transfer.</h6>
            <h6>3. Isi form dibawah sesuai dengan pembayaran yang telah dilakukan.</h6>
            <h6>4. Upload bukti pembayaran.</h6>
            <h6>5. Klik tombol donasi untuk konfirmasi pembayaran.</h6>
        </div>
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="d-grid gap-2 mt-2 pt-2"></div>
            <div class="row">
                <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" style="margin-left: 300px;" for="form3Example3">Nama</label>
                        <input type="text" name="name" id="form3Example3" class="form-control form-control-lg rounded-pill" style="width: 50%; margin-left: 300px;" placeholder="Name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Nominal</label>
                        <input type="number" name="nominal" id="form3Example3" class="form-control form-control-lg rounded-pill" style="width: 50%; margin-left: 0px;" placeholder="Nominal" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label" style="margin-left: 300px;" for="form3Example3">Metode Pembayaran</label>
                    <select name="metode" class="form-select form-select-lg rounded-pill" style="width: 50%; margin-left: 300px;" required>
                        <option>BNI</option>
                        <option>BRI</option>
                        <option>Gopay</option>
                        <option>LinkAja</option>
                        <option>ShopeePay</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Bukti Transfer</label>
                        <input type="email" id="form3Example3" class="form-control form-control-lg rounded-pill" style="width: 50%; margin-left: 0px;" placeholder="Upload File">
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-2 pt-1 justify-content-center" style="margin-bottom: 50px;">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill " style="background-color: #185fa9; width: 100%;">Donasi</button></a>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    @include('partials/footer')
@endsection
