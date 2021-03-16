<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts;
        return view('posts.index', compact('posts'));
    }

    /**
     * Create a new post
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a new post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'published_at' => 'required|date'
        ]);

        $user = $request->user();
        $user->posts()->create($request->all());

        return response()->json(trans('Saved successfully!'), 200);
    }
}
