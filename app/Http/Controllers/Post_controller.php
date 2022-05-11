<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class Post_controller extends Controller
{
    public function index(){

        return view('welcome', ['posts' => Post::all()]);
    }

    public function add_post(Request $request){
        // \Log::info(json_encode($request->all()));
        request()->validate([
                'post_password' => 'required',
                'post_title' => 'required',
                'post_body' => 'required',
        ]);

        $new_post = new Post;
        $new_post->post_password = strip_tags(md5($request->post_password));
        $new_post->post_title = strip_tags($request->post_title);
        $new_post->post_body = strip_tags($request->post_body);
        $new_post->save();

        return redirect('/');
    }

    public function edit(Post $post){
        return view('edit', ['post' => $post]);
    }

    public function edit_post(Post $post){
        request()->validate([
            'post_title' => 'required',
            'post_body' => 'required'
        ]);

        $post->update([
            'post_title' => strip_tags(request('post_title')),
            'post_body' => strip_tags(request('post_body'))
        ]);

        return redirect('/');
    }

    public function delete_post(Post $post){
        $post->delete();

        return redirect('/');
    }
}
