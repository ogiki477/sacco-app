<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        //dd("Yoo");
        if(Auth::user()->is_role == 1){ 
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.list',$data);
        } elseif(Auth::user()->is_role == 0){
            $data['meta_title'] = 'staff_dashboard';
            dd("Staff Dashboard");
           // return view('admin.dashboard.list',$data);
        }
    }

    
}
