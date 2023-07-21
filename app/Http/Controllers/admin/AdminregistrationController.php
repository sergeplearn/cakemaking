<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminregistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminregistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('user_role', 'admin')->get();

        return view('adminregistration.register', ['user' => $user]);
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
    public function store(AdminregistrationRequest $request)
    {
        $this->authorize('create', User::class);
        User::create($request->validated());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        //$this->authorize('update', $user);

        $User->update([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'user_role' => $request['user_role'],

        ]
        );

        $User->update();

        return 'hello';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {

        $this->authorize('delete', $User);

        $User->delete();

        return redirect()->back();
    }
}
