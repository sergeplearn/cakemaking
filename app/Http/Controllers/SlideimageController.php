<?php

namespace App\Http\Controllers;

use App\Models\slideimage;
use Illuminate\Http\Request;

class SlideimageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $slideimage = slideimage::all();

        return view('welcome', ['slideimage' => $slideimage]);
    }
}
