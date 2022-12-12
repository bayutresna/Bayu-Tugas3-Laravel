<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function Login(Request $request){
        if($request->method() == 'GET'){
            return view('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = Pengguna::query()->where('email',$email)->first();

        if($user == null){
            return redirect()
            ->back()
            ->withErrors([
                'msg' => 'email tidak ditemukan'
                ]);
        }
        if(!hash::check($password, $user->password)){
            return redirect()
            ->back()
            ->withErrors([
                'msg' => 'Password salah'
                ]);
        }

        if(!session()->isStarted()) session()->start();

        session()->put('logged',true);
        session()->put('IdUser',$user->id);
        return redirect()->route('homepage');

    }

    function Logout(Request $request){
        session()->flush();
        return redirect()->route('login');
    }
}
