<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\LikePost;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

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
        $user = User::find($id);

        $likesPost = $user->likes_post;
        // dd($likesPost);

        $userlog = Auth::user();
        // dd(($userlog->friendsFrom));
        $users = User::all();

        $a = $userlog->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id);
        // dd($a);

        $friend = Friend::where([
            [
                'user_id', '=', Auth::user()->id
            ],
            [
                'friend_id', '=', $id
            ]
        ])->orWhere([
            [
                'user_id', '=', $id
            ],
            [
                'friend_id', '=', Auth::user()->id
            ]
        ])->first();


        $friendsTo = Auth::user()->friendsTo;
        $friendsFrom = Auth::user()->friendsFrom;
        $friends = $friendsTo->merge($friendsFrom);
        // dd($friends);
        $userData = User::whereRelation('friendsTo', 'friend_id', $user->id)->where('status', 1)->get();
        // dd($userData);
        return view('main.user_detail', ['user' => $user, 'users' => $users, 'friend' => $friend, 'friends' => $friends, 'likesPost' => $likesPost, 'userData' => $userData]);
    }

    public function click()
    {
        $data = 'click';
        return response()->json($data);
    }

    public function scroll()
    {
        $data = 'scroll';
        return response()->json($data);
    }
}
