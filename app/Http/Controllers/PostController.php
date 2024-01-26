<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts =  Post::orderBy("id", "desc")->paginate(10);
        return view("posts.index", compact("posts"));
    }

    public function create() {
        return view("posts.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $user = auth()->user();

        $post = $user->posts()->create([
            "title"  =>  $request->title,
            "body" => $request->body,
            'user_id' => auth()->user()->id,
            'viewer' => 0,
        ]);

        return back()->with("success", "Post has been created");
    }

    public function show($id)
    {
        $post = Post::find($id);

        $post->increment('viewer');

        return view('posts.show', compact('post'));
    }

    public function addLikeToPost(Post $post)
    {
        $user = Auth::user();
        // Check if the user has already liked the post
        if ( ! $post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->create(['user_id' => $user->id]);
            return redirect()->back();
        }

        return redirect()->back();
    }
}
