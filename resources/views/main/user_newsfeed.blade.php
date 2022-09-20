<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mainstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/newsfeedstyle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>NewsFeed</title>
</head>

<body>
    <header>
        <div class="navigation">
            <nav>
                <div class="nav__bar">
                    <!-- nav header -->
                    <div class="nav__header">
                        <a href="/main">
                            <img src="{{ asset('/storage/logo/fakebook.png') }}" alt="logo" class="logo" />
                        </a>


                    </div>

                    <!-- link -->
                    <ul class="link">
                        <li>
                            <a href="#">Heading 1</a>
                        </li>
                        <li>
                            <a href="#">Heading 2</a>
                        </li>
                        <li>
                            <a href="#">Heading 3</a>
                        </li>
                        <li>
                            <a href="#">Heading 4</a>
                        </li>
                    </ul>
                    <div class="main__login">
                        @if (Auth::check())
                            <div class="main__login--user">
                                <a href="/profile">
                                    <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                        alt="">
                                </a>
                                <a href="/logout"> /Đăng xuất</a>
                            </div>
                        @else
                            <div class="main__login--button">
                                <a href="/login">
                                    <div class="button">
                                        <button>Đăng nhập</button>
                                    </div>
                                </a>
                                <a href="/register">
                                    <div class="button">
                                        <button>Đăng ký</button>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container container__body">

        @foreach ($posts as $post)
            @foreach ($friends as $friend)
                @if (($post->user_id == $friend->friend_id && $friend->approved == 1) ||
                    ($post->user_id == $friend->user_id && $friend->approved == 1) ||
                    ($friend->approved == 0 && $post->user_id == Auth::user()->id) ||
                    ($friend && $post->user_id == Auth::user()->id))
                    <div class="card__content">
                        <div class="card card__main">
                            <div class="card-header">
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                        <img src="{{ asset('/storage/avatar/' . $users->where('id', $post->user_id)->first()->avatars->avatar_name) }}"
                                            alt="avatar" width="50px" height="50px">

                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="d-flex flex-column bd-highlight mb-3">
                                            <div class="p-2 bd-highlight">
                                                {{ $users->where('id', $post->user_id)->first()->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->post }}</p>
                                <div class="card-body__link">
                                    @if ($post->link != null || $post->link_image != null)
                                        <a href="{{ $post->link }}">{{ $post->link }}
                                            <img src="{{ $post->link_image }}" alt="">
                                        </a>
                                    @endif

                                    @if ($post->image_name != null)
                                        <div>
                                            <img src="{{ asset('/storage/post_image/' . $post->image_name) }}"
                                                alt="Image">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="post__feed--content">
                                <form action="{{ route('user.post.comment', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" id="post__comment{{ $post->id }}" class="post__feed--content--box" style="resize:none"
                                        placeholder="Viết bình luận" col="1" required></textarea>
                                    <div>
                                        <img id="image_preview_2" height="50px" width="50px" />
                                    </div>
                                    <div class="btn btn__post">
                                        <label for="image">Add image to your Post</label>
                                        <input class="btn__post--post" type="file" name="image"
                                            onchange="loadFile(event)" />
                                    </div>
                                    <input type="submit" value="Comment" id="post__comment--button"
                                        data-id="{{ $post->id }}">
                                </form>
                            </div>

                            <div class="post__feed--footer">
                                <div>
                                    Bình luận
                                </div>
                            </div>


                            <div class="post__feed--comment{{ $post->id }}">
                                <ul id="comment{{ $post->id }}">
                                    @foreach ($users as $us)
                                        @foreach ($post->comments as $comment)
                                            @if ($us->id == $comment->user_id)
                                                <li>
                                                    <div class="post__feed--main cmt_id{{ $comment->id }}">
                                                        <div class="post__feed--item--avatar">
                                                            <img src="{{ asset('/storage/avatar/' . $us->avatars->avatar_name) }}"
                                                                alt="avatar">
                                                        </div>
                                                        <div class="post__feed--main--box">
                                                            <div class="post__feed--main--box2">
                                                                <div class="post__feed--main--box3">

                                                                    <div class="post__feed--comment--info">
                                                                        <div>
                                                                            {{ $us->name }}
                                                                        </div>
                                                                        <div id="comment--info{{ $comment->id }}">
                                                                            {{ $comment->comment }}
                                                                        </div>
                                                                    </div>


                                                                    @if (Auth::check())
                                                                        @if (Auth::user()->id == $comment->user_id)
                                                                            <div class="toggle"></div>
                                                                            <div
                                                                                class="post__feed--comment--button hidden">
                                                                                <div
                                                                                    class="post__feed--comment--delete">
                                                                                    <form
                                                                                        action="{{ route('user.comment.delete', ['id' => $comment->id]) }}"
                                                                                        method="POST"
                                                                                        id="comment__delete">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div>
                                                                                            <button type="submit"
                                                                                                id="comment__button--delete"
                                                                                                data-id="{{ $comment->id }}">
                                                                                                Delete
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div
                                                                                    class="post__feed--comment--update">
                                                                                    <button class="show__modal">
                                                                                        Update
                                                                                    </button>
                                                                                    <div class="modal hidden">
                                                                                        <div class="modal__head">
                                                                                            <button
                                                                                                class="close__modal">
                                                                                                &times;
                                                                                            </button>
                                                                                            <h2>
                                                                                                Chỉnh sửa bình luận
                                                                                            </h2>
                                                                                        </div>
                                                                                        <div class="modal__box">
                                                                                            <form
                                                                                                action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                                method="POST"
                                                                                                id="comment__update">
                                                                                                @method('PUT')
                                                                                                @csrf
                                                                                                <input type="text"
                                                                                                    name="update_comment"
                                                                                                    class="form__input"
                                                                                                    data-id="{{ $comment->id }}"
                                                                                                    id="comment__content--update{{ $comment->id }}"
                                                                                                    placeholder="Content"
                                                                                                    value="{{ $comment->comment }}"
                                                                                                    required />
                                                                                                <input
                                                                                                    class="modal__button--update"
                                                                                                    type="submit"
                                                                                                    value="Lưu"
                                                                                                    data-id="{{ $comment->id }}"
                                                                                                    id="comment__button--update" />
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="overlay hidden">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @elseif(Auth::user()->id == $post->user_id)
                                                                            <div class="toggle"></div>
                                                                            <div
                                                                                class="post__feed--comment--button hidden">
                                                                                <div
                                                                                    class="post__feed--comment--delete">
                                                                                    <form
                                                                                        action="{{ route('user.comment.delete', ['id' => $comment->id]) }}"
                                                                                        method="POST"
                                                                                        id="comment__delete">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div>
                                                                                            <button type="submit"
                                                                                                id="comment__button--delete"
                                                                                                data-id="{{ $comment->id }}">
                                                                                                Delete
                                                                                            </button>

                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="post__feed--reply">
                                                                    <form
                                                                        action="{{ route('user.reply.create', ['id' => $comment->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <textarea type="text" name="reply" placeholder="Viết phản hồi" class="post__feed--content--box"
                                                                            style="resize:none" col="1" required></textarea>
                                                                        <button type="submit">
                                                                            Reply
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                                <div>
                                                                    <ul>
                                                                        @foreach ($users as $uss)
                                                                            @foreach ($comment->replies as $reply)
                                                                                @if ($uss->id == $reply->user_id)
                                                                                    <li>
                                                                                        <div class="post__feed--reply">
                                                                                            <div
                                                                                                class="post__feed--item--avatar">
                                                                                                <img src="{{ asset('/storage/avatar/' . $uss->avatars->avatar_name) }}"
                                                                                                    alt="avatar">
                                                                                            </div>
                                                                                            <div
                                                                                                class="post__feed--reply--box">
                                                                                                <div
                                                                                                    class="post__feed--comment--info">
                                                                                                    <div>
                                                                                                        {{ $uss->name }}
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        {{ $reply->reply }}
                                                                                                    </div>
                                                                                                </div>
                                                                                                @if (Auth::check())
                                                                                                    <div
                                                                                                        class="toggle">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="post__feed--comment--button hidden">
                                                                                                        <div
                                                                                                            class="post__feed--comment--delete">
                                                                                                            <form
                                                                                                                action="{{ route('user.reply.delete', ['id' => $reply->id]) }}"
                                                                                                                method="POST">
                                                                                                                @csrf
                                                                                                                @method('DELETE')
                                                                                                                <div>
                                                                                                                    <input
                                                                                                                        type="submit"
                                                                                                                        value="Delete">
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                {{-- <div>
                                                                                            Reply
                                                                                        </div> --}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                @break
            @endif
        @endforeach
    @endforeach
</main>
<footer>

</footer>
</body>

</html>
