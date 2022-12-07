<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('screens.frontend.post.index', compact('post'));
    }
}
