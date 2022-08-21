<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;


class UploadFileController extends Controller
{
    //
    public function upload_img(Request $request)
    {
        $user = Auth::user();
        // dd($user->id);

        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        // dd($request->all());
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/file_upload');

        $file = UploadFile::create([
            'user_id' => $user->id,
            'file_name' => $name,
            'file_path' => $path
        ]);

        // $file->file_name=$name;
        // $file->file_path=$path;
        // $file->save();

        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
