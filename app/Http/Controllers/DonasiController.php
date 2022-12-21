<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    //
    private function httpRequest($method, $url, $header, $body = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function index(){
        $header = [
                'Accept: application/json',
            ];
    
            $response = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/donasi', $header);
  
            return view('donasi',["title" => "Donasi", 'donasis' => $response]);
    }

    // public function create(){
    //     session_start();
    //     $header = [
    //         'Accept: application/json',
    //         "Authorization: Bearer " . $_SESSION['token']
    //     ];
    //     $body = [
    //         'title' => $_POST['title'],
    //         'desc' => $_POST['desc'],
    //         'target' => $_POST['target'],
    //     ];

    //     $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/user/donasis', $header, $body);
    //     header('Location: /donasi');

    // }
    public function create(){
        
        session_start();

        if(isset($_POST['title'])){
            $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];
        $body = [
            'title' => $_POST['title'],
            'desc' => $_POST['desc'],
            'target' => $_POST['target'],
        ];

        $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/user/donasis', $header, $body);
        return redirect('/donasi');

        }

        if(isset($_POST['title'])){
        }

        if(isset($_SESSION['token'])){
            return view('createDonasi',["title" => "Buat Donasi"]);
        }else {
            return view('notLogin',["title" => "Buat Donasi"]);
        }
    }

    public function open($id){
        $header = [
                'Accept: application/json',
            ];
    
            $response = $this->httpRequest('GET', "http://localhost/sharing_is_caring/public/api/donasi/$id", $header);

        return view('donasipage', [
            'title' => $response['title'],
            'donasi' => $response
        ]);
    }

    public function bayar($id){
        if(isset($_POST['name'])){
            if(!isset($_SESSION['token'])){
                session_start();
            }
            $header = [
                'Accept: application/json',
                "Authorization: Bearer " . $_SESSION['token']
            ];
            $body = [
                'donasi_id' => $id,
                'nominal' => $_POST['nominal'],
                'metode' => $_POST['metode'],
            ];
            $response = $this->httpRequest('POST', "http://localhost/sharing_is_caring/public/api/donasis/transaksi", $header, $body);
            return redirect('/donasi');
        }
        return view('bayarDonasi', ['title' => 'Checkout']);
    }
}
