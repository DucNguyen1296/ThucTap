<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        return view('/show', ['user' => $user]);
    }

    public function index()
    {
        $user = Auth::user();
        // $data = Post::where('user_id', $user->id)->get();
        // dd($user);

        $data = $user->posts;
        $avatar = $user->avatars;
        // dd($avatar->avatar_name);
        // dd($data);
        return view('/profile', ['user' => $user, 'data' => $data, 'avatar' => $avatar]);
    }
}
