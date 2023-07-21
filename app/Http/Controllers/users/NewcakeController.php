<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\newcake;
use Illuminate\Http\Request;

class NewcakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show(newcake $newcake)
    {
        return view('newcake.user.show', ['newcake' => $newcake]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(newcake $newcake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, newcake $newcake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newcake $newcake)
    {
        //
    }
}
