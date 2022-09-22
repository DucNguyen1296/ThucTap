<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');


        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password
            ],
            $remember
        )) {
            $request->session()->regenerate();

            // dd(User::all()); 

            if (Gate::allows('isAdmin')) {
                return redirect(route('admin'));
            } elseif (Gate::allows('isUser')) {
                $users = User::all();
                // $user = User::where('id', $id)->first();
                $user = Auth::user();
                // dd($user);
                $posts = Post::all();

                $friends = $user->friendsFrom;

                Session::flash('correct', 'Đăng nhập thành công');
                return redirect()->route('user.profile', ['name' => Auth::user()->name]);
                // return view('main.user_newsfeed', ['users' => $users, 'posts' => $posts, 'friends' => $friends, 'user' => $user]);
            }
        } else {
            return back()->with('incorrect', 'Email hoặc mật khẩu chưa chính xác. Xin vui lòng thử lại');
        }
    }
}
