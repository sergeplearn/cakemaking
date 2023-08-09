<?php

namespace App\Http\Controllers;

use App\Models\newcake;
use App\QueryFilters\Active;
use App\QueryFilters\sort;
use Illuminate\Pipeline\Pipeline;

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

        $cakes = app(Pipeline::class)
            ->send(newcake::query())->through([
            Active::class,
            sort::class,
        ])->thenReturn()->get();

        return view('Home');

    }
}
