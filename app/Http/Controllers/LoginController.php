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
            // if ($request->get('remember')) {
            //     Auth::setRememberDuration(1); // equivalent to 1 minutes
            // }
            $request->session()->regenerate();
            // $user = $request->all();




            if (Gate::allows('isAdmin')) {
                return redirect(route('admin'));
            } elseif (Gate::allows('isUser')) {
                // $users = User::all();
                // $user = User::where('id', $id)->first();
                $user = Auth::user();
                // dd($user);
                // $posts = Post::all();
                $likesPost = Auth::user()->likes_post;

                $friendsTo = $user->friendsTo;
                $friendsFrom = $user->friendsFrom;
                // dd($friendsFrom);
                $friends = $friendsTo->merge($friendsFrom);

                $users = User::with('friendsTo')->get();

                $postDatas = Post::with('user', 'friends')->get();
                // Session::flash('correct', 'Đăng nhập thành công');
                // return redirect()->route('user.profile', ['name' => Auth::user()->name]);
                // return view('main.user_newsfeed', ['users' => $users, 'postDatas' => $postDatas, 'friendsTo' => $friendsTo, 'friendsFrom' => $friendsFrom, 'friends' => $friends, 'user' => $user, 'likesPost' => $likesPost]);
                // return view('main.user_newsfeed', ['users' => $users, 'postDatas' => $postDatas, 'friends' => $friends, 'user' => $user, 'likesPost' => $likesPost]);
                return redirect(route('user.newsfeed', ['users' => $users, 'postDatas' => $postDatas, 'friendsTo' => $friendsTo, 'friendsFrom' => $friendsFrom, 'friends' => $friends, 'user' => $user, 'likesPost' => $likesPost]));
            }
        } else {
            return back()->with('incorrect', 'Email hoặc mật khẩu chưa chính xác. Xin vui lòng thử lại');
        }
    }
}
