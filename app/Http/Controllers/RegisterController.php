<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $repassword = $request->input('retypepassword');
        $name = $request->input('name');
        $date = $request->input('date');
        $location = $request->input('location');
        $title = $request->input('title');
        $term = $request->input('term');

        $validate = $request->validate([
            'email' => 'required|unique:users,email|email:filter',
            'password' => 'required||min:3',
            'name' => 'required|unique:users,name',
            'term' => 'required'
        ]);


        // $datas = User::all();
        // foreach ($datas as $data) {
        //     if ($email == $data->email) {
        //         Session::flash('')
        //     }
        // }

        if ($password == $repassword) {
            User::create([
                'email' => $email,
                'password' => Hash::make($password),
                'name' => $name,
                'date' => $date,
                'location' => $location,
                'title' => $title
            ]);

            $id = User::where('email', $email)->first()->id;
            // dd($id);
            app('App\Http\Controllers\AvatarController')->avatar($id);
            // session()->flash('regiscorrect', 'Đăng ký thành công');

            Friend::create([
                'user_id' => $id,
                'friend_id' => $id,
                'approved' => 1
            ]);

            Session::flash('regiscorrect', 'Đăng ký thành công');
            return redirect(route('login'));
        } else {
            // session()->flash('notmatch', 'Mật khẩu không khớp, xin nhập lại');
            Session::flash('notmatch', 'Mật khẩu không khớp, xin nhập lại');
            return redirect()->route('register');
        }
    }
}
