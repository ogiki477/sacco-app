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


    public function edit(string $id)
    {
        $data['getRecord'] = LoanType::find($id);
        $data['meta_title'] = 'edit_loan';
        return view('admin.loan_types.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd("Yoo");
        $data = LoanType::find($id);

        $data->type_name = trim($request->type_name);
        $data->description = trim($request->description);

        $data->save();

        return redirect('admin/loan_types/list')->with('success','Loan Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LoanType::find($id);
        $data->delete();
        return redirect('admin/loan_types/list')->with('error','Loan Deleted');
    }
}
