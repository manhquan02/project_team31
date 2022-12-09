<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('screens.frontend.post.index', compact('posts'));
    }

    public function detail($id){
        $post = Post::where('id', $id)->first();
        if($post!=null){
            return view('screens.frontend.post.detail', compact('post'));
        }

        return redirect()->back();
    }
}
