<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

    /**
     * User posts
     */
    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts()->latest('published_at')->get();
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
    public function store(StorePostRequest $request)
    {
        $user = $request->user();
        $user->posts()->create($request->all());

        return response()->json(trans('Saved successfully!'), 200);
    }
}
