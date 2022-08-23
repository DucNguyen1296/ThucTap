<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    //
    public function upload_img(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        // dd($request->all());
        $name = $request->file('image')->hashName();
        $path = $request->file('image')->storeAs('public/file_upload', $name);

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

    public function delete_img($id)
    {
        $user = Auth::user();
        $files = $user->upload_files;
        // dd($files);
        foreach ($files as $file) {
            if ($file->id == $id) {
                $filename = $file->file_name;
            }
        }
        // dd($filename);

        Storage::delete('public/file_upload/' . $filename);

        UploadFile::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function update_img(Request $request, $id)
    {
        $user = Auth::user();
        $old_imgs = $user->upload_files;

        foreach ($old_imgs as $old_img) {
            if ($old_img->id == $id) {
                $old_img_name = $old_img->file_name;
            }
        }

        // dd($old_img_name);
        Storage::delete('public/file_upload/' . $old_img_name);

        $validated = $request->validate([
            'update_img' => 'required|mimes:jpg,png,jpeg'
        ]);

        $name = $request->file('update_img')->hashName();
        $path = $request->file('update_img')->storeAs('public/file_upload', $name);

        UploadFile::where('id', $id)->update([
            'user_id' => $user->id,
            'file_name' => $name,
            'file_path' => $path
        ]);

        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
