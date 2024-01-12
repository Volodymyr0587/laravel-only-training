<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
}
