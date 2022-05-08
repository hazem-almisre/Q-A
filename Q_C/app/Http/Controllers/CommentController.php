<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = Validator::make($request->all(), [
            'description' => ['required']
        ]);

        if ($val->fails()) {
            return $val->errors();
        }
        Comment::query()->create([
            'description' => $request->description,
            'user_id' => Auth::id(),
            'pos_id' => $request->pos_id,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('post.show', $request->pos_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comm = Comment::query()->find($id);
        if (!$comm->isEmpty())
            $comm->delete();
        return redirect()->back();
    }
}
