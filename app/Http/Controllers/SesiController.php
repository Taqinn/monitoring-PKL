<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $infologin=[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'admin') {
                return redirect('/prakerin/admin');
            }elseif (Auth::user()->role == 'guru') {
                return redirect('/prakerin/guru');
            }elseif (Auth::user()->role == 'siswa') {
                return redirect('/prakerin/siswa');
            }elseif (Auth::user()->role == 'panitia') {
                return redirect('/prakerin/panitia');
            }elseif (Auth::user()->role == 'instansi') {
                return redirect('/prakerin/instansi');
            }
        }else{
            return redirect('')->withErrors('Email atau password salah')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
