<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorereplycommentRequest;
use App\Models\replycomment;

class ReplycommentController extends Controller
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
    public function store(StorereplycommentRequest $request)
    {

        // $this->authorize('create',replycomment::class);

        replycomment::create($request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(replycomment $replycomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(replycomment $replycomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorereplycommentRequest $request, replycomment $replycomment)
    {
        $this->authorize('update', $replycomment);

        $replycomment->update($request->validated());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(replycomment $replycomment)
    {
        $this->authorize('delete', $replycomment);
        $replycomment->delete();

        return back();
    }
}
