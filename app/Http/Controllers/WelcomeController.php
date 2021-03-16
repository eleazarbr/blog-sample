<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index(Request $request)
    {
        $order = $request->input('order', 'desc');
        $posts = Post::orderBy('published_at', $order)->paginate(6);
        return view('welcome', compact('posts', 'order'));
    }
}
