<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;


class UploadFileController extends Controller
{
    //
    public function store_file(Request $request)
    {
        $user = Auth::user();
        UploadFile::create([
            'user_id' => $user->id
        ]);

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // dd($request->all());
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public');
        $save = new UploadFile();
        $save->image = $name;
        $save->path = $path;
        $save->save();
        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
