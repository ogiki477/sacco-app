<?php

namespace App\Http\Controllers;

use App\Models\Loan;
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

        return view('admin.loans.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
