@php
    function httpRequest($method, $url, $header, $body = [])
    {
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
        ]);
    
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['token'])) {
        $header = ['Accept: application/json', 'Authorization: Bearer ' . $_SESSION['token']];
    
        $response = httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/profile', $header);
        $name = $response['name'];
    }
@endphp

<link rel="stylesheet" href="/assets/css/style.css">

<nav class="navbar navbar-dark navbar-expand-md fixed-top shadow" style="background-color: #62a7d4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="#">
            <img src="/assets/img/Logo SIC.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top rounded-circle" />
            Sharing is Caring
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light {{ $title === 'Home' ? 'fw-bold' : '' }}" aria-current="page" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{ $title === 'Donasi' ? 'fw-bold' : '' }}" href="{{ url('/donasi') }}">Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{ $title === 'Iuran' ? 'fw-bold' : '' }}" href="{{ url('/iuran') }}">Iuran</a>
                </li>
            </ul>
            @if (isset($_SESSION['token']))
                <a class="text-decoration-none text-light" href="{{ url('/user') }}">
                    {{ $name }}
                </a>
            @else
                <a href="/login"><button class="btn btn-outline-light me-2 rounded-pill " type="submit">Login</button></a>
            @endif
        </div>
    </div>
</nav>
