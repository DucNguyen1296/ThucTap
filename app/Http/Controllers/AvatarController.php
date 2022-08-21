<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    //
    public function avatar(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'required|mimes:jpg,png,jpeg'
        ]);

        $name = $request->file('avatar')->getClientOriginalName();
        $path = $request->file('avatar')->storeAs('public/avatar', $name);

        $avatar = Avatar::where('user_id', $user->id)->update([
            'user_id' => $user->id,
            'avatar_name' => $name,
            'avatar_path' => $path
        ]);

        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
