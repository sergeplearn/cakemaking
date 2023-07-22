<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\upload_img;
use Illuminate\Http\Request;

class UploadImgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([

            'user_id' => 'required',
            'image' => ['mimes:jpeg,png,jpg,nullable'], ]);

        $newImageName = time().'_'.$request->name.'.'.
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $checkimage = upload_img::where('user_id', $request['user_id'])->exists();
        if ($checkimage) {
            return 'hello world';
        }
        if (! $checkimage) {
            upload_img::create([
                'user_id' => $request['user_id'],
                'image_path' => $newImageName,
            ]);

        }

        return redirect('/home', ['checkimage' => $checkimage]);
    }

    /**
     * Display the specified resource.
     */
    public function show(upload_img $upload_img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(upload_img $upload_img)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, upload_img $upload_img)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(upload_img $upload_img)
    {
        //
    }
}
