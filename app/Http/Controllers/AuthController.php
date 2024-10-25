<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request){
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
        
    }

    public function register(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'register';
        return view('auth.register',$data);
    }

    public function forgot(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'forgot';
        return view('auth.forgot',$data);
    }

    public function register_insert(Request $request){
       // dd('yooo');

       $data = $request->validate([

        'first_name'=> 'required',
        'last_name' => 'required',
        'username' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:4',



    ]);

    $data = new User();
    $data->first_name = trim($request->first_name);
    $data->last_name = trim($request->last_name);
    $data->username = trim($request->username);
    $data->email = trim($request->email);
    $data->password = Hash::make($request->password);
    $data->remember_token = Str::random(50);

    $data->save();

    return redirect('')->with('success','Successfully registered');
    }

    public function login_insert(Request $request){

        dd("Yoo");
    }
}
