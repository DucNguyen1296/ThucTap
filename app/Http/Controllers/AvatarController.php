<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    //
    public function avatar(Request $request)
    {
        $user = Auth::user();

        $name = $request->file('default')->hashName();
        $path = $request->file('default')->storeAs('public/avatar', $name);

        $avatar = Avatar::create([
            'user_id' => $user->id,
            'avatar_name' => $name,
            'avatar_path' => $path
        ]);

        return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function avatar_update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'required|mimes:jpg,png,jpeg'
        ]);

        $old_avatar = $user->avatars;
        Storage::delete('public/avatar/' . $old_avatar->avatar_name);

        // $name = $request->file('avatar')->getClientOriginalName();
        $name = $request->file('avatar')->hashName();
        $path = $request->file('avatar')->storeAs('public/avatar', $name);

        $avatar = Avatar::where('user_id', $user->id)->update([
            'user_id' => $user->id,
            'avatar_name' => $name,
            'avatar_path' => $path
        ]);

        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
