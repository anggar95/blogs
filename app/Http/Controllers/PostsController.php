<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->paginate(15);
        return view('blog.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('blog.add');
    }

    public function store(PostsRequest $request)
    {
        $s = Str::limit($request->input('description'), 10);
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $s,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('posts.show', $post->id);//->with('message','Your post has been added!');
    }

    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('blog.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(PostsRequest $request, Post $post)
    {
        $s = Str::limit($request->input('description'), 10);
        $post -> update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $s
            ]);
        return redirect()->route('posts.show', $post->id);
        //->with('message', 'Your post has been updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
//            ->with('message', 'Your post has been deleted!');
    }
}
