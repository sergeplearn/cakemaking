<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\testimonial;
use Intervention\Image\ImageManagerStatic as Image;

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
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {

        $testimonial = $request->user()->testimonial()->create($this->validatedrequest());
        $this->storeimages($testimonial);

        return redirect('/admin/testimonial')->with('msgs', 'successfully updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, testimonial $testimonial)
    {

        $testimonial->update($this->validatedrequest());
        $this->storeimages($testimonial);

        return redirect('/admin/testimonial')->with('msgs', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect('/admin/testimonial')->with('msgs', 'successfully updated');
    }

    private function storeimages($testimonial)
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

            $testimonial->update([
                'image_path' => $filename,

            ]);
        }
    }

    private function validatedrequest()
    {

        return tap(request()->validate([
            'nameofperson' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'more' => ['required', 'string'],

        ]), function () {

            request()->validate([
                'image' => 'file|image|max:5000',
            ]);

        }
        );

    }
}
