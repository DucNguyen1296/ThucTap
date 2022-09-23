<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        // $user = User::where('id', $id)->first();
        $user = Auth::user();
        // dd($user);
        $posts = Post::all();

        $friends = $user->friendsFrom;

        // foreach ($posts as $post) {
        //     foreach ($post->friends as $fr) {
        //         Log::channel('custom')->info(($fr));
        //     }
        // }
        // $friends = Friend::where('user_id', '=', $id)->orWhere('friend_id', '=', $id)->get();

        // dd($friends);

        // Log::channel('custom')->info(($friends));

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

    public function search(Request $request)
    {
        //
        if ($request->ajax()) {
            $search = $request->search;
            $data = User::where('name', 'like', '%' . $search . '%')->get();
            // dd($data);
            $output = '';
            if (count($data) > 0) {
                foreach ($data as $dt) {
                    // $output .= '<li><a href="/user/' . $dt->id . '">' . $dt->name . '</a></li>';
                    $output .= '<li class="row__item"><div class="d-flex flex-row bd-highlight "><div class="row__item--image"><img src="/storage/avatar/' . $dt->avatars->avatar_name . '"></div><div class="row__item--user">
                    <a href="/user/' . $dt->id . '">' . $dt->name . '</a>
                        </div>
                    </div>
                </li>';
                }
            } else {
                $output .= 'No result';
            }
        }
        // dd($data);
        // return back()->with('data', $data);
        return response()->json($output);
        // return $output;
    }


    public function store($id)
    {

        $friend = new Friend();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $id;
        $friend->approved = 0;
        $friend->save();

        $friend = new Friend();
        $friend->user_id = $id;
        $friend->friend_id = Auth::user()->id;
        $friend->approved = 0;
        $friend->save();


        return back();
    }


    public function accept($id)
    {
        //
        $post_1 = Auth::user()->posts;
        $post_2 = User::find($id)->posts;

        $user_1 = Friend::all()->where('friend_id', '=', Auth::user()->id)->where('user_id', '=', $id)->first();
        $user_1->approved = 1;
        // foreach ($post_1 as $p1) {
        //     $p1->friends()->attach(['friend_id' => $user_1->id], ['post_id' => $p1->id]);
        // }
        $user_1->save();

        $user_2 = Friend::all()->where('friend_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
        $user_2->approved = 1;
        // foreach ($post_2 as $p2) {
        //     $p2->friends()->attach(['friend_id' => $user_2->id], ['post_id' => $p2->id]);
        // }
        $user_2->save();
        // dd($user);
        return back();
    }


    public function decline($id)
    {
        //
        $user = Auth::user();

        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('approved', 0);
        foreach ($friendTo as $del_1) {
            $del_1->delete();
        }
        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('approved', 0);
        foreach ($friendFrom as $del_2) {
            $del_2->delete();
        }
        return back();
    }

    public function cancel($id)
    {
        $user = Auth::user();

        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('approved', 0);
        foreach ($friendTo as $del_1) {
            $del_1->delete();
        }
        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('approved', 0);
        foreach ($friendFrom as $del_2) {
            $del_2->delete();
        }

        return back();
    }


    public function destroy($id)
    {
        //
        $user = Auth::user();

        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('friend_id', $id);
        foreach ($friendTo as $del_1) {
            $del_1->delete();
        }
        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('friend_id', Auth::user()->id);
        foreach ($friendFrom as $del_2) {
            $del_2->delete();
        }

        return back();
    }
}
