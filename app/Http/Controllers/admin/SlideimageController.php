<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\slideimage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SlideimageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('slideimage.admin.index', ['slideimage' => slideimage::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slideimag = slideimage::all();
        if ($slideimag->count() < 5) {
            $slideimage = slideimage::create($this->validatedrequest());
            $this->storeimages($slideimage);

            return redirect()->back()->with('msgs', 'successfully updated');
        } else {
            return redirect()->back()->with('limite', 'limite');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slideimage $slideimage)
    {
        $slideimage->update($this->validatedrequest());
        $this->storeimages($slideimage);

        return redirect()->back()->with('msgs', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slideimage $slideimage)
    {
        //
    }

    private function storeimages($slideimage)
    {

        if (! is_dir(public_path('/images'))) {
            mkdir(public_path('/images'), 0777);
        }

        if (request()->hasfile('image')) {
            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Image::make($file)->fit(500, 250)->save(public_path('images/'.$filename));

        }

        if (request()->has('image')) {

            $slideimage->update([
                'image_path' => $filename,

            ]);
        }
    }

    private function validatedrequest()
    {

        return tap(request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'blog' => ['required', 'string', 'max:255'],
            'active' => ['string'],

        ]), function () {

            request()->validate([
                'image' => 'file|image|max:5000',
            ]);

        }
        );

    }
}
