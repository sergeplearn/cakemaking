<?php

namespace App\Http\Controllers\admin;

use App\Events\Newuserhasregisteredevent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminregistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminregistrationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'User');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {    //$this->authorize('viewAny',User::class);
        $user = User::Admin()->get();

        return view('adminregistration.register', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminregistrationRequest $request)
    {
        $this->authorize('create', User::class);
        $User = User::create($request->validated());

        event(new Newuserhasregisteredevent($User));

        return redirect('/admin/User')->with('msgs', 'successfully updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        $this->authorize('update', $User);

        $User->update([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'user_role' => $request['user_role'],

        ]
        );

        $User->update();

        return redirect('/admin/User')->with('msgs', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {

        // $this->authorize('delete', $User);

        $User->delete();

        return redirect('/admin/User')->with('msgs', 'successfully updated');
    }
}
