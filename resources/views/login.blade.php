@php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_SESSION['token'])){
      Header('Location: /');
      exit();
    }
@endphp

@extends('layouts/main')


@section('container')
<style>
    body{
        background-image: url('/assets/img/Vector\ 1.png'), url('/assets/img/Vector\ 2.png'); 
        background-position: center top, center bottom; background-repeat: no-repeat; 
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
            <form action="{{ url('user/login') }}" method="POST">
              {{ csrf_field() }}
              <div class="d-grid gap-2 mt-4 pt-2"></div>
              <h2 class="fw-bold mt-2 pt-1 mb-4">Login</h2>
              @if ($info === 'failed')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Wrong email or password!!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email</label>
                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg rounded-pill" placeholder="example@mail.com" required/>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password"  name="password" id="form3Example4" class="form-control form-control-lg rounded-pill" placeholder="Password" required/>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div class="form-check mb-0"></div>
                <a href="#!" class="text-body">Lupa Password?</a>
              </div>

              <div class="d-grid gap-2 mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill" style="background-color: #185fa9">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Tidak mempunyai akun? <a href="{{ url('/register') }}" class="link-primary">Daftar</a></p>
              </div>
              <a href="beranda.html"></a>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
