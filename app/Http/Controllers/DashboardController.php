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

    public function profile_update(Request $request)
{
    $request->validate([
        'email' => 'required|unique:users,email,' . Auth::user()->id,
    ]);

    $user = User::find(Auth::user()->id);

    // Check if there are any changes
    $hasChanges = (
        trim($request->first_name) !== $user->first_name ||
        trim($request->last_name) !== $user->last_name ||
        trim($request->email) !== $user->email ||
        trim($request->username) !== $user->username ||
        $request->dob !== $user->dob ||
        trim($request->mobile_number) !== $user->mobile_number ||
        !empty($request->file('profile_picture'))
    );

    if ($hasChanges) {
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->username = trim($request->username);
        $user->dob = $request->dob;
        $user->mobile_number = trim($request->mobile_number);

        if (!empty($request->file('profile_picture'))) {
            $file = $request->file('profile_picture');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $user->profile_picture = $filename;
        }

        $user->remember_token = Str::random(50);

        $user->save();

        return redirect('admin/profile')->with('success', 'Profile Successfully Updated');
    }

    // Redirect without message if no changes were made
    return redirect('admin/profile');
}


    
}
