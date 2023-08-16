<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
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

        $like = like::Userid($users->id)->Newcakeid($request->newcake_id)->first();
        if (! $like) {

            $request->User()->likes()->create($validates);

            return back();

        } else {
            return back();
        }

    }
}
