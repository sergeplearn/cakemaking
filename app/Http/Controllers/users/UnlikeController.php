<?php

namespace App\Http\Controllers\users;
use App\Http\Requests; 
use App\Http\Controllers\Controller;
use App\Models\unlike;
use Illuminate\Http\Request;

class UnlikeController extends Controller
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
        $validate = $request->validate([
            'unlike' => 'required',
            'newcake_id' => 'required',
            'user_id' => 'required',
        ]);
        $users = $request->user();
        //dd($users->id);

        $unlike = unlike::where('user_id', $users->id)->where('newcake_id', $request->newcake_id)->first();
        if (! $unlike) {
            unlike::create([
                'unlike' => $request['unlike'],
                'newcake_id' => $request['newcake_id'],
                'user_id' => $request['user_id'],
            ]);

            return back();
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(unlike $unlike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(unlike $unlike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, unlike $unlike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unlike $unlike)
    {
        //
    }
}
