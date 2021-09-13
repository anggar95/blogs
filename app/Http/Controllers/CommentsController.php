<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=request()->get('id');
        $comment = Comment::where('id',$id)->first();
        return view('comments.create',['comment' => $comment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request, Comment $comment)
    {
        if(request()->get('comment_to') !== null)
            $comto=request()->get('comment_to');
        else
            $comto=null;
        $id=request()->get('id');
        $post = Post::where('id', $id)->first();
        $comment = Comment::create([
            'comment' => $request->input('comment'),
            'owner_id' => $post->user_id,
            'post_id' =>  $id,
            'comment_to' => $comto,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id);
    }
}
