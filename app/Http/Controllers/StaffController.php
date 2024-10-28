<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('admin.staff.add');
    }
}
