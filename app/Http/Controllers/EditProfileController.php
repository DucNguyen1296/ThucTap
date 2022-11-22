<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class EditProfileController extends Controller
{
    //
    public function edit_index()
    {
        $user = Auth::user();
        $userData = User::whereRelation('friendsTo', 'friend_id', Auth::user()->id)->where('status', 1)->get();
        $message = $user->friendsMessenger;
        return view('trangchu.pages.editprofile', ['user' => $user, 'userData' => $userData, 'message' => $message]);
    }

    public function update(Request $request)
    {
        $name = $request->input('name');
        $date = $request->input('date');
        $location = $request->input('location');
        $title = $request->input('title');

        User::where('email', Auth::user()->email)->update([
            'name' => $name,
            'date' => $date,
            'location' => $location,
            'title' => $title
        ]);
        Session::flash('change_profile', 'Bạn đã thay đổi thông tin thành công');
        return redirect()->back();
    }
}
