<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        if (Auth::check()) {
            $user = Auth::user();
            $comment = Comment::where('id', $id)->first();
            $post = Post::where('id', $comment->post_id)->first();
            // dd($comment->post_id);
            $reply = $request->input('reply');
            Reply::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'comment_id' => $comment->id,
                'reply' => $reply
            ]);
            return redirect(route('default'));
        } else {
            Session::flash('comment_session', 'Xin vui lòng đăng nhập trước khi bình luận');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Storage::delete('public/comment_image/' . $comment->image_name);
        Reply::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('default');
    }
}
