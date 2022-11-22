<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function post_index($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post_update', ['post' => $post]);
    }

    public function post(Request $request)
    {
        $user = Auth::user();
        $title = $request->input('title');
        $post = $request->input('post');
        $link = $request->input('link');

        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            // $name = $request->file('image')->getClientOriginalName();
            $name = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs('public/post_image', $name);

            // Post::where('title', $title)->update([
            //     'image_name' => $name,
            //     'image_path' => $path
            // ]);

            $p = Post::create([
                'user_id' => $user->id,
                'title' => $title,
                'post' => $post,
                'link' => $link,
                'image_name' => $name,
                'image_path' => $path,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        } else {
            $p = Post::create([
                'user_id' => $user->id,
                'title' => $title,
                'post' => $post,
                'link' => $link
            ]);
        }

        if ($request->filled('link')) {
            $url = file_get_contents($link);

            $DOM = new DOMDocument('1.0', 'UTF-8');
            $internalErrors = libxml_use_internal_errors(true);
            $DOM->loadHTML($url);
            libxml_use_internal_errors($internalErrors);
            $imgs = $DOM->getElementsByTagName('img');

            // $title = $DOM->getElementsByTagName('title');

            foreach ($imgs as $img) {
                // Log::channel('custom')->info($content->getAttribute('data-src'));
                if ($img->getAttribute('data-src') != "") {
                    $link_img = $img->getAttribute('data-src');
                }
            }

            Post::where('title', $title)->update([
                'link' => $link,
                'link_image' => $link_img
            ]);

            $p['link_image'] = $link_img;
        }
        // $p = Post::where('title', $title)->first();
        // dd($path);
        return response()->json($p);
        // return redirect()->route('user.profile', ['name' => $user->name]);
    }

    public function update_post(Request $request, $id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $title = $request->input('title');
        $post_update = $request->input('post');
        $link = $request->input('link');

        if ($request->hasFile('image')) {

            if ($post->image_name != null) {
                Storage::delete('public/post_image/' . $post->image_name);
            }
            $validated = $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg'
            ]);


            $name = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs('public/post_image', $name);

            Post::where('id', $id)->update(
                [
                    'title' => $title,
                    'post' => $post_update,
                    'image_name' => $name,
                    'image_path' => $path,
                    'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                ]
            );
        } else {
            Post::where('id', $id)->update(
                [
                    'title' => $title,
                    'post' => $post_update,
                    'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                ]
            );
        }

        if ($request->filled('link')) {
            $url = file_get_contents($link);

            $DOM = new DOMDocument('1.0', 'UTF-8');
            $internalErrors = libxml_use_internal_errors(true);
            $DOM->loadHTML($url);
            libxml_use_internal_errors($internalErrors);
            $imgs = $DOM->getElementsByTagName('img');

            // $title = $DOM->getElementsByTagName('title');

            foreach ($imgs as $img) {
                // Log::channel('custom')->info($content->getAttribute('data-src'));
                if ($img->getAttribute('data-src') != "") {
                    $link_img = $img->getAttribute('data-src');
                }
            }
            Post::where('id', $id)->update([
                'link' => $link,
                'link_image' => $link_img
            ]);
        }

        // return redirect()->route('user.profile', ['name' => $user->name]);
        return back();
    }

    public function delete_post($id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $comment = Comment::where('post_id', $id);
        $reply = Reply::where('post_id', $id);
        // dd($post);
        if ($post->image_name != null) {
            Storage::delete('public/post_image/' . $post->image_name);
        }
        Post::where('id', $id)->firstOrFail()->delete();
        $comment->delete();
        $reply->delete();
        // return redirect()->route('user.profile', ['name' => $user->name]);
        return back();
    }
}
