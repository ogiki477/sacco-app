<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd('Yoo');
       $data['meta_title'] = 'loan_types_list';
       $data['getRecord']  = LoanType::get();
       return view('admin.loan_types.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // dd("Yooooo");
       $data['meta_title'] = 'add_loan_type';
       return view('admin.loan_types.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd("Yooo");
       $data = $request->validate([
        'type_name' => 'required',
        'description' => 'required',

    ]);

    $data = new LoanType();
    
    $data->type_name = trim($request->type_name);
    $data->description = trim($request->description);
    $data->save();

    return redirect('admin/loan_types/list')->with('success','Loan Successfully Added');
}





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
