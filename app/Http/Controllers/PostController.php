<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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

        Post::create([
            "title"  =>  $request->title,
            "body" => $request->body
        ]);

        return back()->with("success", "Post has been created");
    }

    public function addLikeToPost(Post $post, User $user)
    {
        // Check if the user has already liked the post
        if ( ! $post->likes()->where('user_id', $user->id)->exists()) {
            $like = new Like(['user_id' => $user->id]);
            $post->likes()->save($like);
        }

        return redirect()->back();
    }
}
