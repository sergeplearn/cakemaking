<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamsRequest;
use App\Models\team;
use Intervention\Image\ImageManagerStatic as Image;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('teams.admin.index', ['team' => team::with('user')->latest()->get()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamsRequest $request)
    {

        $team = $request->user()->teams()->create($this->validatedrequest());
        $this->storeimages($team);

        return redirect('/admin/team')->with('msgs', 'successfully updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamsRequest $request, team $team)
    {

        $team->update($this->validatedrequest());
        $this->storeimages($team);

        return redirect('/admin/team')->with('msgs', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(team $team)
    {

        $team->delete();

        return redirect('/admin/team')->with('msgs', 'successfully updated');
    }

    private function storeimages($team)
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

            $team->update([
                'image_path' => $filename,

            ]);
        }
    }

    private function validatedrequest()
    {

        return tap(request()->validate([
            'nameofperson' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'more' => 'required|string',
            'tell' => 'required|phone:AUTO,CM',
        ]), function () {

            request()->validate([
                'image' => 'file|image|max:5000',
            ]);

        }
        );

    }
}
