<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request){
        //dd("Yoo");
        if(Auth::user()->is_role == 1){ 
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.list',$data);
        } elseif(Auth::user()->is_role == 0){
            $data['meta_title'] = 'staff_dashboard';
            //dd("Staff Dashboard");
            return view('admin.staff.dashboard.list',$data);
        }
    }



    public function profile(Request $request){

        //dd("Yoooo");
        $data['meta_title'] = 'profile';
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.profile.update',$data);
    }

    public function profile_update(Request $request){

        //dd("Yoooo");

        $data = $request->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
           $data = User::find(Auth::user()->id);
           $data->first_name = trim($request->first_name);
           $data->last_name = trim($request->last_name);
           $data->email = trim($request->email);
           $data->username = trim($request->username);
           $data->dob = $request->dob;
           $data->mobile_number = trim($request->mobile_number);
    
           if(!empty($request->file('profile_picture'))){
             $file = $request->file('profile_picture');
             $randomStr = Str::random(30);
             $filename = $randomStr. '.'.$file->getClientOriginalExtension();
             $file->move('upload/profile/',$filename);
             $data->profile_picture = $filename;
           }
    
           $data->remember_token = Str::random(50);
    
           $data->save();
    
           return redirect('admin/profile')->with('success','Profile Successfully Updated');

    }

    
}
