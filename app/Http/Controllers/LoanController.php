<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanPlan;
use App\Models\LoanType;
use App\Models\LoanUser;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("Yooo");
        $data['meta_title'] = 'loans';
        $data['getRecord'] = Loan::get();
        return view('admin.loans.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yooooo");
        $data['meta_title'] = 'add_loan';
        $data['getLoanStaff'] = User::where('is_role','=' ,'0')->where('is_delete','=','0')->get();
        $data['getLoanUser'] = LoanUser::get();
        $data['getLoanType'] = LoanType::get();
        $data['getLoanPlan'] = LoanPlan::get();

        return view('admin.loans.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd("Yoooo");
        $data = $request->validate([
            'user_id' => 'required',
            'loan_plans_id' => 'required',
            'loan_types_id' => 'required',
            'staff_id' => 'required',
            'loan_amount' => 'required',
            'purpose' => 'required'
    
           ]);
    
           $data = new Loan();
    
           $data->user_id = trim($request->user_id);
           $data->loan_types_id = trim($request->loan_types_id);
           $data->loan_plans_id = trim($request->loan_plans_id);
           $data->staff_id = trim($request->staff_id);
           $data->loan_amount = trim($request->loan_amount);
           $data->purpose = trim($request->purpose);
    
    
           $data->save();
    
           return redirect('admin/loans/list')->with('success','The Loan is successfully Added');
           
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
