<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\newcake;

class NewcakeController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(newcake $newcake)
    {

        $comment = comment::Selectcakeid($newcake->id)->latest()->get();

        return view('newcake.user.show', ['newcake' => $newcake, 'comment' => $comment]);

    }
}
