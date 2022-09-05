<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mainstyle.css') }}">
    <title>Trang tin tức</title>
</head>

<body>
    <header>
        <div class="navigation">
            <nav>
                <div class="nav__bar">
                    <!-- nav header -->
                    <div class="nav__header">
                        <img src="{{ asset('/storage/logo/fakebook.png') }}" alt="logo" class="logo" />
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

    <main>
        <div class="post">
            <div class="post__advertise">

            </div>

            <div class="post__feed">
                @foreach ($users as $user)
                    @foreach ($user->posts as $post)
                        <div class="post__feed--item">
                            <a href="{{ route('user.profile.detail', ['id' => $user->id]) }}">
                                <div class="post__feed--item--head">
                                    <div class="post__feed--item--avatar">
                                        <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                            alt="avatar">
                                    </div>
                                    <div class="post__feed--item--info">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </a>
                            <div>
                                <a href="{{ route('main.post.detail', ['id' => $post->id]) }}">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <div class="post__feed--item--title">
                                {{ $post->post }}
                            </div>
                            <div class="post__feed--item--link">
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

                            <div class="post__feed--content">
                                <form action="{{ route('user.post.comment', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" id="" class="post__feed--content--box" style="resize:none"
                                        placeholder="Viết bình luận" col="1"></textarea>
                                    <input type="submit" value="Comment">
                                </form>
                            </div>

                            <div class="post__feed--footer">
                                <div>
                                    Bình luận
                                </div>
                            </div>

                            <div class="post__feed--comment">
                                <ul>
                                    @foreach ($users as $us)
                                        @foreach ($post->comments as $comment)
                                            @if ($us->id == $comment->user_id)
                                                <li>
                                                    <div class="post__feed--main">
                                                        <div class="post__feed--item--avatar">
                                                            <img src="{{ asset('/storage/avatar/' . $us->avatars->avatar_name) }}"
                                                                alt="avatar">
                                                        </div>
                                                        <div class="post__feed--main--box">
                                                            <div class="post__feed--main--box2">
                                                                <div class="post__feed--comment--info">
                                                                    <div>
                                                                        {{ $us->name }}
                                                                    </div>
                                                                    <div>
                                                                        {{ $comment->comment }}
                                                                    </div>
                                                                </div>

                                                                @if (Auth::check())
                                                                    @if (Auth::user()->id == $comment->user_id)
                                                                        <div class="post__feed--comment--button">
                                                                            <div class="post__feed--comment--delete">
                                                                                <form
                                                                                    action="{{ route('user.comment.delete', ['id' => $comment->id]) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div>
                                                                                        <input type="submit"
                                                                                            value="Delete">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="post__feed--comment--update">
                                                                                <button class="show__modal">
                                                                                    Update
                                                                                </button>
                                                                                <div class="modal hidden">
                                                                                    <div class="modal__head">
                                                                                        <button class="close__modal">
                                                                                            &times;
                                                                                        </button>
                                                                                        <h2>
                                                                                            Chỉnh sửa bình luận
                                                                                        </h2>
                                                                                    </div>
                                                                                    <div class="modal__box">
                                                                                        <form
                                                                                            action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            <input type="text"
                                                                                                name="update_comment"
                                                                                                class="form__input"
                                                                                                placeholder="Content"
                                                                                                value="{{ $comment->comment }}"
                                                                                                required />
                                                                                            <input
                                                                                                class="modal__button--update"
                                                                                                type="submit"
                                                                                                value="Lưu">
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="overlay hidden"></div>
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
                                                                    <input type="text" name="reply"
                                                                        placeholder="Viết phản hồi">
                                                                    <button type="submit">
                                                                        Reply
                                                                    </button>
                                                                </form>

                                                            </div>
                                                            <div>
                                                                {{-- @foreach ($users as $us) --}}
                                                                {{-- @foreach ($comments->replies as $reply) --}}
                                                                <ul>
                                                                    <li>
                                                                        <div>
                                                                            <div>Avatar</div>
                                                                            <div>
                                                                                <div>
                                                                                    <div>
                                                                                        username
                                                                                    </div>
                                                                                    <div>
                                                                                        reply content
                                                                                        {{-- {{ $reply }} --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    Reply
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                {{-- @endforeach --}}
                                                                {{-- @endforeach --}}
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
                    @endforeach
                @endforeach
            </div>

            <div class="post__advertise">

            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

@if (session()->has('comment_session'))
    <script>
        alert('{{ session('comment_session') }}');
    </script>
@endif

</html>
