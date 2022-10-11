<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'phone' => 'required|digits:12|min:8|max:13',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $request->image,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
       
        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'phone' => 'required|digits:12|min:8|max:13',
            'email' => 'required|email'
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'image' => $request->image,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return auth()->user();


    }


    public function password(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'phone' => 'required|digits:12|min:8|max:13',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'image' => $request->image,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    public function show(){
        return auth()->user();
    }
    public function logout()
    { 
        auth()->user()->token()->revoke();
        return response()->json(['logout' => 'success'], 200);

    }
}
