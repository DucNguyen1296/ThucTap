<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadFile;

class UploadFileController extends Controller
{
    //
    public function store_file(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // dd($request->all());
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new UploadFile();
        $save->image = $name;
        $save->path = $path;
        // // dd($path);
        $save->save();
        return view('/login');
    }
}
