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

        $data['meat_title'] = "add_user";

        return view('admin.loanuser.add',$data);
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
