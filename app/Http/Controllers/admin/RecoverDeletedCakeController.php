<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\newcake;

class RecoverDeletedCakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cakes = newcake::withTrashed()->get();

        return view('newcake.admin.recoveditems', ['cakes' => $cakes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(newcake $newcake, $id)
    {
        $cakes = newcake::where('id', $id)->withTrashed()->first();
        $cakes->restore();

        return redirect('/admin/newcake');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newcake $newcake)
    {

    }
}
