<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\upload_img;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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
        return view('image');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $checkimage = upload_img::where('user_id', $request['user_id'])->exists();
        if ($checkimage) {
            return 'hello world';
        }
        if (! $checkimage) {
            $upload_img = upload_img::create($this->validatedrequest());
            $this->storeimage($upload_img);

        }

        return view('welcome', ['checkimage' => $checkimage])->with('msgs', 'successfully updated');
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
        $upload_img->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(upload_img $upload_img)
    {
        //
    }

    private function storeimage($upload_img)
    {

        if (! is_dir(public_path('/images'))) {
            mkdir(public_path('/images'), 0777);
        }

        if (request()->hasfile('image')) {
            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Image::make($file)->fit(250, 250)->save(public_path('images/'.$filename));

        }

        if (request()->has('image')) {
            $upload_img->update([
                'image_path' => $filename,

            ]);
        }
    }

    private function validatedrequest()
    {

        return tap(request()->validate([
            'user_id' => 'required',

        ]), function () {

            request()->validate([
                'image' => 'file|image|max:5000|mimes:jpeg,png,jpg',
            ]);

        }
        );

    }
}
