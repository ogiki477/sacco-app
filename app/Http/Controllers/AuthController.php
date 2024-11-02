<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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


    public function forgot_update(Request $request){

       // dd("Yooo");
       $count = User::where('email','=',$request->email)->count();

       if($count > 0){

        $data = User::where('email','=',$request->email)->first();

        $random_pass = rand(111111,999999);

        $data->password = Hash::make($random_pass);

        $data->save();

        $data->random_pass = $random_pass;

        Mail::to($data->email)->send(new ForgotPasswordMail($data));

        return redirect()->back()->with('success','Password has been sent to your email');

       }else{
        return redirect()->back()->with('error','Email Not Found');
       }

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

        //dd("Yoo");
        if(Auth::attempt(['email' => $request->email,'password' => $request->password], true)){
            if(Auth::User()->is_role == '1'){

                return redirect()->intended('admin/dashboard');

            }elseif(Auth::User()->is_role == '0'){
                return redirect()->intended('staff/dashboard');

            }else{
                return redirect('/')->with('error','Invalid Credentials');
            }
        }else{

            return redirect('/')->with('error','Invalid Credentials');

        }
    }

    public function logout(Request $request){

        //dd("Yooo");

        Auth::logout();
        return redirect('/');
    }

   
}
