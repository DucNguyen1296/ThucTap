<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Log;

class PasswordController extends Controller
{
    //
    public function change_index()
    {
        return view('/password.change_password');
    }

    public function updatePassword(Request $request)
    {
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $retype_newpassword = $request->input('retype_newpassword');

        $validation = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required || min:3'
        ]);


        if (!Hash::check($old_password, Auth::user()->password)) {
            Session::flash('old_password', 'Mật khẩu cũ không hợp lệ. Xin thử lại !!!');
            return back();
        }

        if ($new_password == $retype_newpassword) {
            User::where('name', Auth::user()->name)->update([
                'password' => Hash::make($new_password)
            ]);
            Session::flash('change_password', 'Bạn đã thay đổi password thành công');
            return redirect()->route('user.profile', ['name' => Auth::user()->name]);
        } else {
            Session::flash('notmatch', 'Mật khẩu mới không khớp, xin nhập lại');
            return back();
        }
    }


    public function forgot_index()
    {
        return view('/password.forgot_password');
    }

    public function forgot_send(Request $request)
    {
        $user_name = $request->input('user_name');
        $users = User::all();
        foreach ($users as $us) {
            $user = $us->where('name', $user_name)->first();
            if ($user == null) {
                return back();
            }
        }
        Mail::to('taikhoandangky99@gmail.com')->send(new NewMail($user));
        return redirect(route('login'));
    }


    public function reset_index()
    {
        return view('password.reset_password');
    }

    public function reset_password(Request $request, $id)
    {
        $new_password = $request->input('new_password');
        $retype_newpassword = $request->input('retype_newpassword');
        dd($id);
        $validation = $request->validate([
            'new_password' => 'required || min:3'
        ]);

        if ($new_password == $retype_newpassword) {
            User::where('id', $id)->update([
                'password' => Hash::make($new_password)
            ]);
            Session::flash('reset_password', 'Bạn đã thay đổi password thành công');
            return redirect(route('login'));
        } else {
            Session::flash('notmatch', 'Mật khẩu mới không khớp, xin nhập lại');
            return back();
        }
    }
}
