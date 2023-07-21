<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('testimonial.admin.index', ['testimonial' => testimonial::with('user')->latest()->get()]);
       
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
        $newImageName = time().'_'.$request->name.'.'.
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $request->user()->testimonial()->create([
            'nameofperson' => $request['nameofperson'],
            'position' => $request['position'],
            'more' => $request['more'],
            'image_path' => $newImageName,
        ]);

        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, testimonial $testimonial)
    {
        $newImageName = time().'_'.$request->name.'.'.
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $testimonial->update([

            'nameofperson' => $request['nameofperson'],
            'position' => $request['position'],
            'more' => $request['more'],
            'image_path' => $newImageName,
        ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back();
    }

}
