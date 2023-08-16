<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('teams.user.indexs', ['team' => team::with('user')->latest()->get()]);

    }
}
