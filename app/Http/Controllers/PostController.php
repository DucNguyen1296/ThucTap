<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function post_index($id)
    {
        $post = Post::where('id', $id)->first();
        // dd($post);
        return view('post', ['post' => $post]);
    }

    public function post(Request $request)
    {
        $user = Auth::user();
        $title = $request->input('title');
        $post = $request->input('post');
        $link = $request->input('link');

        // dd($link);
        $url = file_get_contents('https://vnexpress.net/nga-noi-se-dam-phan-neu-ukraine-dau-hang-vo-dieu-kien-4504917.html');
        // dd($url);
        $DOM = new DOMDocument('1.0', 'UTF-8');

        $internalErrors = libxml_use_internal_errors(true);

        $DOM->loadHTML($url);

        libxml_use_internal_errors($internalErrors);

        // dd($DOM);

        $Content = $DOM->getElementsByTagName('img');

        // dd($Content);

        foreach ($Content as $content) {
            // Log::channel('custom')->info($content->getAttribute('data-src'));
            // $img = $content->getAttribute('data-src');
            if ($content->getAttribute('data-src') != "") {
                $img = $content->getAttribute('data-src');
                // dd($img);
            }
        }
        // dd($img);


        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);

            $name = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs('public/post_image', $name);

            Post::create([
                'user_id' => $user->id,
                'title' => $title,
                'post' => $post,
                'link' => $link,
                'image_name' => $name,
                'image_path' => $path
            ]);
        } else {
            Post::create([
                'user_id' => $user->id,
                'title' => $title,
                'post' => $post,
                'link' => $link
            ]);
        }

        return redirect()->route('user.profile', ['name' => $user->name, $img]);
    }

    public function update_post(Request $request, $id)
    {
        $user = Auth::user();
        $update_post = $request->input('content');
        $post = Post::where('id', $id)->first();

        if ($request->hasFile('update_img')) {
            Storage::delete('public/post_image/' . $post->image_name);

            $validated = $request->validate([
                'update_img' => 'required|mimes:jpg,png,jpeg'
            ]);

            $name = $request->file('update_img')->hashName();
            $path = $request->file('update_img')->storeAs('public/post_image', $name);
            // dd($request->all());
            Post::where('id', $id)->update(
                [
                    'post' => $update_post,
                    'image_name' => $name,
                    'image_path' => $path
                ]
            );
        } else {
            Post::where('id', $id)->update(
                [
                    'post' => $update_post
                ]
            );
        }

        return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function delete_post($id)
    {
        $user = Auth::user();
        $post = $user->posts->first();
        // dd($post);
        Storage::delete('public/post_image/' . $post->image_name);
        Post::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('user.profile', ['name' => $user->name]);
    }
}
