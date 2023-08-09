<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $newcakes = DB::table('newcakes')
            ->select('price')->get();
        $teams = DB::table('teams')
            ->select('more')->get();
        $testimonials = DB::table('testimonials')
            ->select('more')->get();
        $users = DB::table('users')
            ->select('name')->get();

        return view('admin.admin', ['newcakes' => $newcakes, 'teams' => $teams, 'testimonials' => $testimonials, 'users' => $users]);
    }
}
