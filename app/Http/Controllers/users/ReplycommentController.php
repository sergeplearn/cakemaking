<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorereplycommentRequest;
use App\Models\replycomment;

class ReplycommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorereplycommentRequest $request)
    {

        $this->authorize('create', replycomment::class);

        replycomment::create($request->validated());

        return back();
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
        // $this->authorize('delete', $replycomment);
        $replycomment->delete();

        return redirect('user/newcake/'.$replycomment->newcake_id);
    }
}
