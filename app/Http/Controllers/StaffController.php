<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index(Request $request){

        //dd("Yoo");

        $data['meta_title'] = 'staff_list';

        $data['getRecord'] = User::where('is_delete' ,'=', 0)->get();
        $data['meta_title'] = 'staff-list';
        return view('admin.staff.list',$data);
    }

    public function add(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'add_staff';
        return view('admin.staff.add',$data);
    }

    public function add_insert(Request $request){
        // echo ('yoo');
        // dd($request->all());
 
        $data = $request->validate([
         'first_name' => 'required',
         'last_name' => 'required',
         'username' => 'required',
         'email' => 'required|unique:users',
         'is_role'=> 'required'
 
        ]);
 
        $data = new User;
        $data->first_name = trim($request->first_name);
        $data->last_name = trim($request->last_name);
        $data->email = trim($request->email);
        $data->username = trim($request->username);
        $data->dob = $request->dob;
        
        $data->is_role = $request->is_role;
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
 
        return redirect('admin/staff/list')->with('success','The User has been created Successfully');
 
     }
 
}