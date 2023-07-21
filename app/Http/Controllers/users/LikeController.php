<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validates = $request->validate([
            'like' => 'required',
            'newcake_id' => 'required',
            'user_id' => 'required',
        ]);
        $users = $request->user();
        //dd($users->id);

        $like = like::where('user_id', $users->id)->where('newcake_id', $request->newcake_id)->first();
        if (! $like) {

            $request->User()->likes()->create($validates);

            return back();

        } else {
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(like $like)
    {
        //
    }
}
