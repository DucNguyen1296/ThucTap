<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    //
    public function main_index()
    {
        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();
        $replies = Reply::all();
        // dd($comments);
        return view('main.main', ['users' => $users, 'posts' => $posts, 'comments' => $comments, 'replies' => $replies]);
    }

    public function main_post_detail($id)
    {
        $post = Post::where('id', $id)->first();
        $user = User::where('id', $post->user_id)->first();
        // dd($posts);
        $comments = Comment::all();
        return view('main.post_detail', ['user' => $user, 'post' => $post]);
    }

    public function main_user_detail($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);
        return view('main.user_detail', ['user' => $user]);
    }
}
