<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Friend;
use App\Models\Messenger;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

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

        return view('main.timeline', ['user1' => $user1, 'user2' => $user2, 'friend' => $friend, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newsfeed()
    {
        // $users = User::all();
        // $postDatas = Post::all();

        $user = Auth::user();

        $likesPost = Auth::user()->likes_post;

        $friendsTo = $user->friendsTo;
        $friendsFrom = $user->friendsFrom;
        $friends = $friendsTo->merge($friendsFrom);
        // dd($friends);

        // $userData = DB::table('users')->join('friends', 'users.id', '=', 'friends.user_id')->get();
        $userData = User::whereRelation('friendsTo', 'friend_id', Auth::user()->id)->where('status', 1)->get();
        // dd($userData);
        // $userData = User::whereHas('friendsTo')->get();
        // $users = User::select()->join('friends', 'users.id', 'friends.user_id')->get();
        // $users = User::with('friendsTo')->get();
        $users = collect([]);
        foreach ($userData as $us) {
            foreach (User::whereRelation('friendsTo', 'friend_id', $us->id)->where('status', 1)->get() as $uss) {
                $users = ($users->push($uss))->unique();
            }
        }
        // dd($users[1]->avatars);
        // $postDatas = DB::table('posts')->join('friends', 'posts.user_id', '=', 'friends.user_id')->join('users', 'users.id', '=', 'friends.user_id')->get();
        // $postDatas = Post::select()->join('friends', 'posts.user_id', 'friends.user_id')->join('users', 'users.id', 'friends.user_id')->get();
        $postDatas = $user->friendsPost->sortByDesc('created_at');
        // dd($postDatas);
        $message = $user->friendsMessenger;

        // return view('main.user_newsfeed', ['users' => $users, 'postDatas' => $postDatas, 'friendsTo' => $friendsTo, 'friendsFrom' => $friendsFrom, 'friends' => $friends, 'user' => $user, 'likesPost' => $likesPost, 'userData' => $userData]);
        return view('trangchu.home', ['users' => $users, 'postDatas' => $postDatas, 'friendsTo' => $friendsTo, 'friendsFrom' => $friendsFrom, 'friends' => $friends, 'user' => $user, 'likesPost' => $likesPost, 'userData' => $userData, 'message' => $message]);
    }


    public function show($id)
    {
        //
        $user = User::find($id);


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
        $friendsTo = $user->friendsTo;
        $friendsFrom = $user->friendsFrom;
        $friends = $friendsTo->merge($friendsFrom);
        $userData = User::whereRelation('friendsTo', 'friend_id', Auth::user()->id)->where('status', 1)->get();
        // dd($friendsFrom);
        $message = $user->friendsMessenger;
        // dd($friendsFrom->where('approved', 1)->where('id', '!=', $user->id)[2]->users);
        return view('trangchu.pages.friend', ['user' => $user, 'friend' => $friend, 'friends' => $friends, 'friendsFrom' => $friendsFrom, 'friendsTo' => $friendsTo, 'userData' => $userData, 'message' => $message]);
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
                    $output .= '<li class="row__item"><div class="d-flex flex-row bd-highlight "><div class="row__item--image"><img src="/storage/avatar/' . $dt->avatars->avatar_name . '" width="50px" height="50px"></div><div class="row__item--user">
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
        $friend->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $friend->save();

        $friend = new Friend();
        $friend->user_id = $id;
        $friend->friend_id = Auth::user()->id;
        $friend->approved = 1;
        $friend->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $friend->save();


        return back();
    }


    public function accept($id)
    {
        //
        $post_1 = Auth::user()->posts;
        $post_2 = User::find($id)->posts;

        // $user_1 = Friend::all()->where('friend_id', '=', Auth::user()->id)->where('user_id', '=', $id)->first();
        $user_1 = Auth::user()->friendsFrom->where('user_id', $id)->first();
        // dd($user_1);
        $user_1->approved = 1;
        $user_1->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        // foreach ($post_1 as $p1) {
        //     $p1->friends()->attach(['friend_id' => $user_1->id], ['post_id' => $p1->id]);
        // }
        $user_1->save();

        // $user_2 = Friend::all()->where('friend_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
        $user_2 = User::find($id)->friendsFrom->where('user_id', Auth::user()->id)->first();
        $user_2->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        // dd($user_2);
        // $user_2->approved = 1;
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

        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('friend_id', $id)->first();

        $friendTo->delete();

        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        $friendFrom->delete();

        return back();
    }

    public function cancel($id)
    {
        $user = Auth::user();

        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('friend_id', $id)->first();
        $friendTo->delete();

        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        $friendFrom->delete();

        return back();
    }


    public function destroy($id)
    {


        $user = Auth::user();
        $friendTo = $user->friendsTo->where('user_id', Auth::user()->id)->where('friend_id', $id)->first();

        $friendTo->delete();

        $friendFrom = $user->friendsFrom->where('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        $friendFrom->delete();

        return back();
    }
}
