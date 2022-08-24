<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function main_index()
    {
        $users = User::all();

        // dd($users[1]->posts->post);
        // dd($posts);

        // dd($userid);
        return view('main.main', ['users' => $users]);
    }
}
