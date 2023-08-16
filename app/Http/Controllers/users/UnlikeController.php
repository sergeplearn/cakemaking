<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\unlike;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
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

        $unlike = unlike::Unlikeuserid($users->id)->Unlikenewcakeid($request->newcake_id)->first();
        if (! $unlike) {
            unlike::create($validate);

            return back();
        } else {
            return back();
        }
    }
}
