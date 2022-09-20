<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $user1 = Auth::user();
        $user2 = User::where('id', $id)->first();
        $friend = Friend::where('user_id', '=', $user1->id)->where('friend_id', '=', $user2->id)->first();
        // dd($friend);
        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();
        $replies = Reply::all();

        return view('main.timeline', ['user1' => $user1, 'user2' => $user2, 'friend' => $friend, 'users' => $users, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newsfeed($id)
    {
        $users = User::all();
        $user = User::where('id', $id)->first();
        // dd($user);
        $posts = Post::all();
        // $friends = Friend::where('user_id', $id)->get();
        // $friends = Friend::all();
        $friends = Friend::where('user_id', '=', $id)->orWhere('friend_id', '=', $id)->get();

        if ($friends->count() == 0) {
            $friends = [];
        }
        // dd($friends);
        dd(gettype($friends));
        // $friend = Friend::where('user_id', '=', $id)->orWhere('friend_id', '=', $id)->get();
        // dd($user);

        // foreach ($posts as $post) {
        //     Log::channel('custom')->info($post);
        // }

        // foreach ($friends as $friend) {
        //     Log::channel('custom')->info($friend);
        // }
        return view('main.user_newsfeed', ['users' => $users, 'posts' => $posts, 'friends' => $friends, 'user' => $user]);
    }


    public function show($id)
    {
        //
        $user = User::find($id);

        $users = User::all();

        $friend = Friend::where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id)->first();
        $a = Auth::user()->friendsFrom;
        dd($a);
        // dd($friend);
        return view('main.showfriends', ['user' => $user, 'users' => $users, 'friend' => $friend]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
        Friend::create(
            [
                'user_id' => Auth::user()->id,
                'friend_id' => $id
            ]
        );

        // $friend = new Friend();
        // $friend->user_id = $id;
        // $friend->friend_id = Auth::user()->id;
        // $friend->save();

        return back();
    }


    public function accept($id)
    {
        //
        $user = Friend::all()->where('friend_id', '=', Auth::user()->id)->where('user_id', '=', $id)->first();
        $user->approved = 1;
        $user->save();
        // dd($user);
        return back();
    }


    public function decline($id)
    {
        //
        $user = Friend::all()->where('friend_id', '=', Auth::user()->id)->where('user_id', '=', $id)->first();
        // dd($user);
        $user->delete();
        return back();
    }

    public function cancel($id)
    {
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
        // dd($friend);
        $friend->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        // dd($friend);
        $friend->delete();

        return back();
    }
}
