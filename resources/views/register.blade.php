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
    <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet">

    <div class="form-signin w-100 m-auto text-center">
        <form action="{{ url('/user/register') }}" method="POST">
            {{ csrf_field() }}
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal">Please Register</h1>

            @if ($info === 'failed')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Register failed!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="form-floating">
                <input type="file" name="image" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Image</label>
            </div>
            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating">
                <input type="tel" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Phone</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

            <p class="mt-3">Have an account ? <a href="{{ url('/login') }}">Login</a></p>

            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </div>
@endsection
