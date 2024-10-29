<?php

namespace App\Http\Controllers;

use App\Models\LoanUser;
use Illuminate\Http\Request;

class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("Yoooo");

        $data['meta_title'] = "loan_users";
        $data['getRecord'] = LoanUser::get();
        return view('admin.loanuser.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yoooo");

        $data['meta_title'] = "add_user";

        return view('admin.loanuser.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd('Yooo');

       $data = $request->validate([
        'first_name' => 'required',
        'last_name'  => 'required',
        'address' => 'required',
        'contact' => 'required',
        'email' => 'required|unique:loan_user',
        'tax_id' => 'required'

    ]);

    $data = new LoanUser();

   

    $data->first_name = trim($request->first_name);
    $data->last_name = trim($request->last_name);
    $data->address = trim($request->address);
    $data->contact = trim($request->contact);
    $data->email = trim($request->email);
    $data->tax_id = trim($request->tax_id);

    $data->save();

    return redirect('admin/loan_user/list')->with('success','The loan User is Successfully Added');
    

    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd("Yoooo");

        $data['meta_title'] = 'edit_user';

        $data['getRecord'] = LoanUser::find($id);

        return view('admin.loanuser.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd("Yoooooo");

        
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'address' => 'required',
            'tax_id' => 'required',
            'contact' => 'required',
        ]);

        $data = LoanUser::find($id);

        $data->first_name = trim($request->first_name);
        $data->last_name = trim($request->last_name);
        $data->address = trim($request->address);
        $data->contact = trim($request->contact);
        $data->email = trim($request->email);
        $data->tax_id = trim($request->tax_id);

        $data->save();

        return redirect('admin/loan_user/list')->with('success','The loan User is Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LoanUser::find($id);
        $data->delete();
        return redirect('admin/loan_user/list')->with('error','The loan User has been deleted');


    }
}
