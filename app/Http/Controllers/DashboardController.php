<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        //dd("Yoo");
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.list',$data);
    }

    public function index2(Request $request){

        dd("Staff");    
    }
}
