<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $data['meta_title'] = 'login';
        return view('auth.login');
        
    }

    public function register(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'login';
        return view('auth.register');
    }

    public function forgot(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'forgot';
        return view('auth.forgot');
    }
}
