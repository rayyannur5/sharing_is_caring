@php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['token'])) {
        Header('Location: /');
        exit();
    }
@endphp

@extends('layouts/main')


@section('container')
    <style>
        body {
            background-image: url('/assets/img/Vector\ 1.png'), url('/assets/img/Vector\ 2.png');
            background-position: center top, center bottom;
            background-repeat: no-repeat;
            background-size: contain;
            background-color: #fff
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 border-end">
                    <img src="/assets/img/donate.png" class="img-fluid ms-auto" alt="Sample image" />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-3 offset-xl-1">
                    <form action="{{ url('/user/register') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="d-grid gap-2 mt-4 pt-2"></div>
                        <h2 class="fw-bold mt-2 pt-1 mb-4">Daftar</h2>
                        @if ($info === 'failed')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Wrong email or password!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Nama input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example1">Nama</label>
                            <input type="text" name="name" id="form3Example1" class="form-control form-control-lg rounded-pill" placeholder="Nama" />
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example2">Email</label>
                            <input type="email" name="email" id="form3Example2" class="form-control form-control-lg rounded-pill" placeholder="example@mail.com" />
                        </div>
                        <!-- No input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">No Telepon</label>
                            <input type="tel" name="phone" id="form3Example3" class="form-control form-control-lg rounded-pill" placeholder="08123456789" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg rounded-pill" placeholder="Password" />
                        </div>

                        <div class="d-grid gap-2 mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill" style="background-color: #185fa9">Daftar</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Sudah mempunyai akun? <a href="{{ url('/login') }}" class="link-primary">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
