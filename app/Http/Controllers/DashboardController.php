<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanPlan;
use App\Models\LoanType;
use App\Models\LoanUser;
use App\Models\Logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request){
        //dd("Yoo");
        if(Auth::user()->is_role == 1){ 
        $data['getStaffandAdminCount'] = User::get()->count();
        $data['getloanTypesCount'] = LoanType::get()->count();
        $data['getloanPlanCount'] = LoanPlan::get()->count();
        $data['getloanCount'] = Loan::get()->count();
        $data['getloanUserCount'] = LoanUser::get()->count();
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.list',$data);
        } elseif(Auth::user()->is_role == 0){
            $data['meta_title'] = 'staff_dashboard';
            //dd("Staff Dashboard");
            return view('admin_staff.dashboard.list',$data);
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
            !empty($request->file('profile_picture')) ||
            (!empty($request->password) && !Hash::check($request->password, $user->password))
        );
    
        if ($hasChanges) {
            // Update fields
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
    
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
    
            $user->save();
    
            return redirect('admin/profile')->with('success', 'Profile Successfully Updated');
        }
    
        // Redirect without message if no changes were made
        return redirect('admin/profile');
    }


    public function profile_staff(Request $request){
        //dd("Yooo");
        $data['meta_title'] = 'staff_profile';
        $data['getRecord'] = User::find(Auth::user()->id);

        return view('admin_staff.profile.staff_profile',$data);
    }


    public function profile_staff_update(Request $request){

        //dd("Yooo");
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
            !empty($request->file('profile_picture')) ||
            (!empty($request->password) && !Hash::check($request->password, $user->password))
        );
    
        if ($hasChanges) {
            // Update fields
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
    
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
    
            $user->save();
    
            return redirect('staff/profile')->with('success', 'Profile Successfully Updated');
        }
    
        // Redirect without message if no changes were made
        return redirect('staff/profile');
    }
    
    public function website_logo(Request $request){

        $data['meta_title'] = 'logo_update';

        return view('admin.logo.update',$data);
    }

    public function website_logo_insert(Request $request){
        //dd("Yooo");

        $data = new Logo();

        $data->name = trim($request->name);
        if(!empty($request->file('logo'))){
            $file = $request->file('logo');
            $randomStr = Str::random(30);
            
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/logo/', $filename);
            $data->logo = $filename;
        }
        $data->save();

        return redirect('admin/logo')->with('success','Logo Updated Successfully');
    }
}
