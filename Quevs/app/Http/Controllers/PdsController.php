<?php

namespace App\Http\Controllers;

use App\Models\Pds;
use Illuminate\Http\Request;

class PdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('layout.sidebar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Pds $pds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pds $pds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pds $pds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pds $pds)
    {
        //
    }
}
