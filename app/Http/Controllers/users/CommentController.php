<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecommentReques;
use App\Models\comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecommentReques $request)
    {

        $request->user()->comments()->create($request->validated());

        return redirect()->back()->with('msgs', 'successfully updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorecommentReques $request, comment $comment)
    {
        // $this->authorize('update', $comment);

        $comment->update($request->validated());

        return redirect()->back()->with('msgs', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        // $this->authorize('delete', $comment);
        $comment->replycomments()->delete();
        $comment->delete();

        return redirect('user/newcake/'.$comment->newcake_id)->with('msgs', 'successfully updated');

    }
}
