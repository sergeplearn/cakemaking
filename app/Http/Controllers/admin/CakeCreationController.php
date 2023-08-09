<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorenewcakeRequest;
use App\Models\newcake;
use Illuminate\Http\Request;
//use Image;
use Intervention\Image\ImageManagerStatic as Image;

class CakeCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('newcake.admin.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenewcakeRequest $request)
    {

        $this->authorize('create', newcake::class);
        $newcake = $request->user()->newcake()->create($this->validatedrequest());
        $this->storeimage($newcake);

        return redirect()->back()->with('msgs', 'successfully updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, newcake $newcake)
    {

        $this->authorize('update', $newcake);

        $newcake->update($this->validatedrequest());
        $this->storeimage($newcake);

        return redirect('admin/newcake')->with('msgs', 'successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newcake $newcake)
    {
        $this->authorize('delete', $newcake);
        $newcake->delete();

        return redirect('admin/newcake')->with('msgs', 'successfully updated');
    }

    private function storeimage($newcake)
    {

        if (! is_dir(public_path('/images'))) {
            mkdir(public_path('/images'), 0777);
        }

        if (request()->hasfile('image')) {
            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Image::make($file)->fit(300, 300)->save(public_path('images/'.$filename));

        }

        if (request()->hasfile('image')) {

            $img = request()->file('image');
            $extension = $img->getClientOriginalExtension();
            $names = time().'.'.$extension;
            $image = Image::make($img)->resize(20, 20);
            $image->blur();
            $image->save(public_path('bgimg/'.$names), 80);

        }

        if (request()->has('image')) {
            $newcake->update([
                'image_path' => $filename,
                'image_paths' => $names,
            ]);
        }
    }

    private function validatedrequest()
    {

        return tap(request()->validate([
            'nameofperson' => ['required', 'string', 'max:255'],
            'nameofcake' => ['required', 'string', 'max:255'],
            'tell' => 'required|phone:AUTO,CM',
            'price' => ['required', 'string', 'max:255'],
            'more' => ['required'],

        ]), function () {

            request()->validate([
                'image' => 'file|image|max:5000',
            ]);

        }
        );

    }
}
