<?php

namespace App\Http\Controllers;

class UserController extends Controller
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

    public function index()
    {
        session_start();

        if (!isset($_SESSION['token'])) {
            Header('Location: /login');
            exit();
        }

        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];

        $response = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/profile', $header);
        $responsetransaksi = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/donasis/transaksi', $header);
        $data = $responsetransaksi['data'];
        for ($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['donasi_id'];
            $responsedonasi = $this->httpRequest('GET', "http://localhost/sharing_is_caring/public/api/donasi/$id", ['Accept: application/json']);
            $data[$i]['donasi_id'] = $responsedonasi;
        }
        // dd($data);
        return view('profile', [
            "title" => $response['name'],
            "name" => $response['name'],
            "phone" => $response['phone'],
            "email" => $response['email'],
            'donasi' => $data
        ]);
    }

    public function viewLogin()
    {
        return view('login', [
            "title" => 'Login',
            'info' => 'unset'
        ]);
    }

    public function viewRegister()
    {
        return view('register', [
            "title" => 'Register',
            'info' => 'unset'
        ]);
    }

    public function viewUpdate()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];

        $response = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/profile', $header);

        return view('updateUser', [
            "title" => $response['name'],
            "name" => $response['name'],
            "phone" => $response['phone'],
            "email" => $response['email'],
            'info' => 'unset'
        ]);
    }

    public function viewSecurity()
    {
        session_start();
        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];

        $response = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/profile', $header);

        return view('security', [
            "title" => $response['name'],
            'info' => 'unset'
        ]);
    }

    public function login()
    {

        session_start();
        $header = [
            'Accept: application/json'
        ];
        $body = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/login', $header, $body);

        if (isset($response['token'])) {
            $_SESSION['token'] = $response['token'];
            header('Location: /');
            exit();
        } else {
            return view('login', [
            "title" => 'Login',
            'info' => 'failed'
        ]);
        }
    }

    public function register()
    {
        session_start();

        $header = [
            'Accept: application/json'
        ];
        $body = [
            'name' => $_POST['name'],
            'image' => null,
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
        ];

        $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/register', $header, $body);

        if (isset($response['token'])) {
            $_SESSION['token'] = $response['token'];
            echo "<script>
                alert('Pendaftaran berhasil');
            </script>";
            header('Location: /');
            exit();
        } else {
            return view('register', [
                'title' => 'Register',
                'info' => 'failed'
            ]);
        }
    }

    public function update()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];
        $body = [
            'name' => $_POST['name'],
            'image' => null,
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
        ];

        $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/update', $header, $body);
        if (isset($response['name'])) {
            return view('updateUser', [
                'title' => $response['name'],
                "name" => $response['name'],
                "phone" => $response['phone'],
                "email" => $response['email'],
                'info' => 'success'
            ]);
        } else {
            return view('updateUser', [
                'title' => $_POST['name'],
                "name" => $response['name'],
                "phone" => $response['phone'],
                "email" => $response['email'],
                'info' => 'failed'
            ]);
        }
    }

    public function logout()
    {
        session_start();
        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];
        $response = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/logout', $header);

        if (isset($response['logout'])) {
            session_unset();
            session_destroy();

            header('Location: /');
            exit();
        } else {
            echo "gagal logout";
        }
    }

    public function password(){
        session_start();
        $header = [
            'Accept: application/json',
            "Authorization: Bearer " . $_SESSION['token']
        ];
        $response = $this->httpRequest('GET', 'http://localhost/sharing_is_caring/public/api/profile', $header);
        
        $headerLogin = [
            'Accept: application/json'
        ];
        $bodyLogin = [
            'email' => $response['email'],
            'password' => $_POST['currentPassword'],
        ];
        $responseLogin = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/login', $headerLogin, $bodyLogin);

        if(isset($responseLogin['token'])){

            $headerPassword = [
                'Accept: application/json',
                "Authorization: Bearer " . $_SESSION['token']
            ];
            $bodyPassword = [
                'name' => $response['name'],
                'phone' => $response['phone'],
                'email' => $response['email'],
                'password' => $_POST['newPassword'],
            ];
            $responsePassword = $this->httpRequest('POST', 'http://localhost/sharing_is_caring/public/api/password', $headerPassword, $bodyPassword);

            $_SESSION['token'] = $responsePassword['token'];
            return view('security', [
                'title' => $response['name'],
                'info' => 'success'
            ]);
        }else{
            return view('security', [
                'title' => $response['name'],
                'info' => 'failed'
            ]);
        }
    }
}
