<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $testimonial = testimonial::latest()->take(3)->get();

        return view('testimonial.user.index', ['testimonial' => $testimonial]);

    }
}
