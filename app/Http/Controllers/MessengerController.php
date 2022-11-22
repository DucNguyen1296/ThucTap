<?php

namespace App\Http\Controllers;

use App\Models\Messenger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    //
    public function index($id)
    {
        $user = Auth::user();
        // dd($user->avatars->avatar_name);
        $userChat = User::find($id);
        $friendsTo = $user->friendsTo;
        $friendsFrom = $user->friendsFrom;
        $friends = $friendsTo->merge($friendsFrom);
        $userData = User::whereRelation('friendsTo', 'friend_id', $user->id)->where('status', 1)->get();

        $messengers = Messenger::where([
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
        ])->orderBy('created_at', 'ASC')->get();
        // dd($messengers);
        $message = $user->friendsMessenger;
        // return view("main.messenger", ['user' => $user, 'userlog' => $user, 'userChat' => $userChat, 'userData' => $userData, 'friends' => $friends, 'messengers' => $messengers]);
        return view("trangchu.pages.message", ['user' => $user, 'userChat' => $userChat, 'userData' => $userData, 'friends' => $friends, 'messengers' => $messengers, 'message' => $message]);
    }

    public function store(Request $request, $id)
    {

        $data = Messenger::create([
            'user_id' => Auth::user()->id,
            'friend_id' => $id,
            'messenger' => $request->input('messenger'),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);

        // $messenger = new Messenger();
        // $messenger->user_id = Auth::user()->id;
        // $messenger->friend_id = $id;
        // $messenger->messenger = $request->input('messenger');
        // $messenger->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        // $data = $messenger;
        // $messenger->save();
        return response()->json($data);
    }
}
