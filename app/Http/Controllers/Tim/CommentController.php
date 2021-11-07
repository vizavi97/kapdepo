<?php

namespace App\Http\Controllers\Tim;

use App\Comment;
use App\NewIt;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {
        $comment = new Comment();
        $comment->name = strlen($request->name) > 0 ? $request->name : null;
        $comment->comment = $request->comment;
        $comment->parent_slug = $request->parent;
        $comment->categories_id = $request->parent != "kd" ? $request->cat : null;

        $comment->saveOrFail();

        return redirect()->back();

    }

    public function list()
    {

        $comments = Comment::all();

        foreach ($comments as $comment) {
            $comment->parent_title = NewIt::select('title')->where('id', $comment->categories_id)->first();
        }
        return view('admin.tim.comments.list')->with('comments', $comments);
    }

    public function delete(Request $request)
    {

        Comment::where("id", $request->id)->first()->delete();

        return redirect()->route('comments.list')->with('message', "Comment successfully deleted");

    }
}
