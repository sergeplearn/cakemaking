<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorenewcakeRequest;
use Propaganistas\LaravelPhone\Casts\RawPhoneNumberCast;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;
use App\Models\newcake;
use Illuminate\Http\Request;

class CakeCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('newcake.admin.index', ['cakes' => newcake::with('user')->latest()->get()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenewcakeRequest $request)
    {

        $validated = $request->validated();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('images'), $filename);

        }
        // $newImageName = time().'_'.$request->name.'.'.
        //$request->image->extension();
        //$request->image->move(public_path('images'), $newImageName);
      
        $this->authorize('create', newcake::class);
        $request->user()->newcake()->create([
            'nameofperson' => $request['nameofperson'],
            'nameofcake' => $request['nameofcake'],
            'tell' => $request['tell'],
            'price' => $request['price'],
            'more' => $request['more'],
            'image_path' => $filename,

        ]);

        return redirect()->back()->with('msgs', 'successfully updated');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, newcake $newcake)
    {
        $this->authorize('update', $newcake);

        $newcake->nameofperson = request('nameofperson');
        $newcake->nameofcake = request('nameofcake');
        $newcake->price = request('price');
        $newcake->tell = request('tell');
        $newcake->user_id = request('user_id');
        $newcake->more = request('more');
        $newcake->save();

        return redirect('admin/newcake')->with('msgs', 'successfully updated');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newcake $newcake)
    {
        $this->authorize('delete', $newcake);
        $newcake->delete();

        return redirect('admin/newcake')->with('msgs', 'successfully updated');;
    }
}
