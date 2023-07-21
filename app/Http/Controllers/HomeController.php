<?php

namespace App\Http\Controllers;

use App\Models\newcake;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cakes = newcake::all();

        return view('Home', ['cakes' => newcake::with('user')->latest()->get()]);

    }
}
