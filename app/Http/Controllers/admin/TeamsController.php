<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\TeamsRequest; 
use App\Http\Controllers\Controller;
use App\Models\team;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamsRequest $request)
    {
        $request->validated();
        $newImageName = time().'_'.$request->name.'.'.
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $request->user()->teams()->create([
            'nameofperson' => $request['nameofperson'],
            'position' => $request['position'],
            'tell' => $request['tell'],
            'more' => $request['more'],
            'image_path' => $newImageName,
        ]);

        return redirect('/admin/team')->with('msgs', 'successfully updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(teams $teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teams $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamsRequest $request, team $team)
    {
        $request->validated();
        $newImageName = time().'_'.$request->name.'.'.
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $team->update([

            'nameofperson' => $request['nameofperson'],
            'position' => $request['position'],
            'tell' => $request['tell'],
            'more' => $request['more'],
            'image_path' => $newImageName,

        ]
        );

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
}
