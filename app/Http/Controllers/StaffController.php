<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request){

        //dd("Yoo");

        $data['meta_title'] = 'staff_list';

        return view('admin.staff.list');
    }
}
