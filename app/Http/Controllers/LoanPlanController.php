<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use Illuminate\Http\Request;

class LoanPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("Yoo");
        $data['meta_title'] = 'loan_plans';
        $data['getRecord'] = LoanPlan::get();
        return view('admin.loan_plan.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yoo");
        $data['meta_title'] = 'loan_plans';

        return view('admin.loan_plan.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd("Yoooo");

       $data = $request->validate([
        'Months' => 'required',
        'interest_percentage' => 'required',
        'penalty_rate' => 'required'
    ]);

    $data = new LoanPlan();
    
    $data->interest_percentage =  trim($request->interest_percentage);
    $data->Months = trim($request->Months);
    $data->penalty_rate = trim($request->penalty_rate);

    $data->save();

    return redirect('admin/loan_plan/list')->with('success','The Loan Plan has been successfully Added');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd("Yooo");
         //dd('Yoo');
         $data['meta_title'] =  'edit_loanplan';
         $data['getRecord'] = LoanPlan::find($id);
 
         return view('admin.loan_plan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd("Yooooo");
        $data = LoanPlan::find($id);

        $data->Months = trim($request->Months);
        $data->interest_percentage = trim($request->interest_percentage);
        $data->penalty_rate = trim($request->penalty_rate);
 
        $data->save();
 
        return redirect('admin/loan_plan/list')->with('success','The Loan Plan has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LoanPlan::find($id);
        $data->delete();
        return redirect('admin/loan_plan/list')->with('error','The Loan Plan has been Deleted');
 

    }
}
