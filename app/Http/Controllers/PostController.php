<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function post_index($id)
    {
        $post = Post::where('id', $id)->first();
        // dd($post);
        return view('post', ['post' => $post]);
    }

    public function post(Request $request)
    {
        $user = Auth::user();
        $post = $request->input('post');
        Post::create([
            'post' => $post,
            'user_id' => $user->id
        ]);
        return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function update_post(Request $request, $id)
    {
        $user = Auth::user();
        $update_post = $request->input('content');
        Post::where('id', $id)->update(
            [
                'post' => $update_post
            ]
        );
        return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function delete_post($id)
    {
        $user = Auth::user();
        Post::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
