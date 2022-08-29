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

        $post = $user->posts;

        $avatar = $user->avatars;
        // $file = $user->upload_files;
        return view('/profile', ['user' => $user, 'post' => $post, 'avatar' => $avatar]);
    }
}
