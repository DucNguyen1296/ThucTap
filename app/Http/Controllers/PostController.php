<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    //
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
}
