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

    <title>Document</title>
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

                        <nav class="navbar nav__search navbar-light bg-light ">
                            <div class="container-fluid">
                                {{-- <form action="/search" class="d-flex" method="GET"> --}}

                                <input class="form-control me-2" type="text" placeholder="Search User"
                                    aria-label="Search" id="search" name="search">
                                {{-- <button class="btn btn-outline-success" id='btn_search'
                                        type="submit">Search</button> --}}
                                {{-- </form> --}}

                                <div class="form__group">
                                    <ul class="search__result">

                                    </ul>
                                </div>

                            </div>
                        </nav>
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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Notification
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @if (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->isNotEmpty() &&
                                    Auth::user()->friendsTo->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->isNotEmpty())
                                    @foreach (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id) as $friendFrom)
                                        <li>
                                            <img src="{{ asset('/storage/avatar/' . $friendFrom->users->avatars->avatar_name) }}"
                                                alt="Profile Picture" width="50" height="50">
                                            <div style="display: inline-block">
                                                {{ $friendFrom->users->name }}
                                                <div data-userid="{{ $friendFrom->users->id }}">
                                                    <form
                                                        action="{{ route('user.friend.accept', ['id' => $friendFrom->users->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm request" type="submit">
                                                            Accept
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('user.friend.decline', ['id' => $friendFrom->users->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm request" type="submit">
                                                            Decline
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    {{-- (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->count() == 0) --}}
                                    You Don't have any Friend Request
                                @endif

                            </ul>
                        </div>

                        <div class="main__login--user">
                            <a href="/profile">
                                <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                    alt="">
                            </a>
                            <a href="/logout"> /Đăng xuất</a>
                        </div>

                    </div>
            </nav>
        </div>
    </header>
    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <div class="navbar-brand" href="#">
                                <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}" alt=""
                                    width="80" height="80" class="d-inline-block align-text-top">
                                {{ $user->name }}
                            </div>
                        </div>
                    </nav>
                </div>
                @if (Auth::user()->id != $user->id)
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <button class="btn btn-primary" type="submit">Nhắn tin</button>
                        </div>
                        <div class="p-2 bd-highlight">

                            {{-- @if (Auth::user()->id == $friend->user_id && $user->id == $friend->friend_id) --}}
                            @if ($friend != null)
                                @if ($friend->approved == 0)
                                    @if ($friend->user_id == $user->id)
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Đợi xét duyệt bạn bè
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <form
                                                        action="{{ route('user.friend.accept', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="dropdown-item d-block p-2 bg-dark text-white"
                                                            type="submit">Chấp nhận lời mời</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('user.friend.cancel', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item d-block p-2 bg-dark text-white"
                                                            type="submit">Hủy lời mời kết bạn</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Đã gửi kết bạn
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <form
                                                        action="{{ route('user.friend.cancel', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item d-block p-2 bg-dark text-white"
                                                            type="submit">Hủy lời mời kết bạn</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @else
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Đã là bạn bè
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <form action="{{ route('user.friend.delete', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item d-block p-2 bg-dark text-white"
                                                        type="submit">Xóa bạn
                                                        bè</button>
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item d-block p-2 bg-dark text-white"
                                                    href="#">Xem
                                                    bạn bè</a></li>
                                            <li><a class="dropdown-item d-block p-2 bg-dark text-white"
                                                    href="{{ route('user.friend.timeline', ['id' => $user->id]) }}">Dòng
                                                    thời gian chung</a></li>
                                        </ul>
                                    </div>
                                @endif
                            @else
                                <form action="{{ route('user.friend.store', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Thêm bạn bè</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-around">
                <div class="p-2 bd-highlight">
                    <a href="{{ route('user.profile.detail', ['id' => $user->id]) }}">Bài viết</a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#">Giới thiệu</a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="{{ route('user.friend.show', ['id' => $user->id]) }}">Bạn bè</a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#">Ảnh</a>
                </div>
                @if (Auth::user()->id == $user->id)
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('user.newsfeed', ['id' => $user->id]) }}">Your News Feed</a>
                    </div>
                @endif
                <div class="p-2 bd-highlight">
                    <a href="#">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>

    {{-- @if ($friend != null || Auth::user()->id == $user->id) --}}
    @if (($friend != null && $friend->approved == 1) || Auth::user()->id == $user->id)
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight ">
                <div class="d-flex flex-column align-items-center bd-highlight mb-3 ">
                    @if (Auth::user()->id == $user->id)
                        <div class="post__content">
                            <div class="post__header">
                                <div>
                                    <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                        alt="">
                                </div>
                                <div class="post__header--button">
                                    <button class="show__modal">
                                        {{ Auth::user()->name }} ơi, bạn đang nghĩ gì thế?
                                    </button>
                                </div>
                            </div>
                            <div class="post__content--box modal2 hidden" id="post__content--box">
                                <div class="post__content--box--header">
                                    Tạo bài viết mới
                                    <button class="close__modal">
                                        &times;
                                    </button>
                                </div>
                                <form action="/post" method="POST" enctype="multipart/form-data" id="post__main">
                                    @csrf
                                    <div class="post__content--box--title">
                                        <input type="text" name="title" placeholder="Tiêu đề" id="post__title">
                                    </div>
                                    <div class="post__box">
                                        <textarea name="post" class="post__box--content" style="resize:none" cols="30" rows="5"
                                            placeholder="Bạn đang nghĩ gì?" id="post__text"></textarea>
                                    </div>
                                    <div class="post__url">
                                        <input class="post__url--preview" type="url" name="link"
                                            placeholder="Link" value="" id="post__link">

                                    </div>

                                    <div>
                                        <img id="image_preview" height="50px" width="50px" />
                                    </div>
                                    <div class="btn btn__post">
                                        <label for="image">Add image to your Post</label>
                                        <input class="btn__post--img" id="post__image" type="file" name="image"
                                            onchange="loadFile(event)" />
                                    </div>

                                    <div class="btn btn__post">
                                        <input class="btn__post--post" type="submit" value="Post"
                                            id="post__button" />
                                    </div>
                                </form>
                            </div>
                            <div class="overlay hidden">
                            </div>
                        </div>
                    @endif
                    <div class="p-2 bd-highlight post__header">
                        Bài Viết
                    </div>
                    <div class="p-2 bd-highlight">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <div class="post__feed" id="post__feed">
                                    @foreach ($user->posts as $post)
                                        <div class="post__feed--item" id="">
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
                                                <form action="{{ route('user.post.comment', ['id' => $post->id]) }}"
                                                    method="POST">
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
                                                                    <div
                                                                        class="post__feed--main cmt_id{{ $comment->id }}">
                                                                        <div class="post__feed--item--avatar">
                                                                            <img src="{{ asset('/storage/avatar/' . $us->avatars->avatar_name) }}"
                                                                                alt="avatar">
                                                                        </div>
                                                                        <div class="post__feed--main--box">
                                                                            <div class="post__feed--main--box2">
                                                                                <div class="post__feed--main--box3">

                                                                                    <div
                                                                                        class="post__feed--comment--info">
                                                                                        <div>
                                                                                            {{ $us->name }}
                                                                                        </div>
                                                                                        <div
                                                                                            id="comment--info{{ $comment->id }}">
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
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                id="comment__button--delete"
                                                                                                                data-id="{{ $comment->id }}">
                                                                                                                Delete
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="post__feed--comment--update">
                                                                                                    <button
                                                                                                        class="show__modal">
                                                                                                        Update
                                                                                                    </button>
                                                                                                    <div
                                                                                                        class="modal2 hidden">
                                                                                                        <div
                                                                                                            class="modal__head">
                                                                                                            <button
                                                                                                                class="close__modal">
                                                                                                                &times;
                                                                                                            </button>
                                                                                                            <h2>
                                                                                                                Chỉnh
                                                                                                                sửa bình
                                                                                                                luận
                                                                                                            </h2>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal__box">
                                                                                                            <form
                                                                                                                action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                                                method="POST"
                                                                                                                id="comment__update">
                                                                                                                @method('PUT')
                                                                                                                @csrf
                                                                                                                <input
                                                                                                                    type="text"
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
                                                                                                    <div
                                                                                                        class="overlay hidden">
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
                                                                                                            <button
                                                                                                                type="submit"
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
                                                                                                        <div
                                                                                                            class="post__feed--reply">
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
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">Thông tin cá nhân</div>
                    <div class="p-2 bd-highlight">Flex item 2</div>
                </div>
            </div>
        </div>
    @endif
</body>

<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    let loadFile = function(event) {
        let image_preview = document.getElementById('image_preview');
        let image_preview2 = document.getElementById('image_preview_2');
        image_preview.src = URL.createObjectURL(event.target.files[0]);
        image_preview2.src = URL.createObjectURL(event.target.files[0]);
        // console.log(image_preview);
    };
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#comment__button--delete', function(e) {
        e.preventDefault();
        let comment_id = e.target.getAttribute("data-id");
        console.log(comment_id);
        confirm("Are You sure want to delete !");
        axios.delete(
            "/delete_comment/" + comment_id

        ).then(function(response) {
            $('.cmt_id' + comment_id).remove();
        }).catch(function(error) {
            console.log(error);
        });
    });

    $(document).on('click', '#comment__button--update', function(e) {
        e.preventDefault();
        let comment_id = e.target.getAttribute("data-id");
        console.log(comment_id);
        let comment = $('#comment__content--update' + comment_id).val();
        console.log(comment);

        let form = document.getElementById('comment__update');
        let formData = new FormData(form);

        console.log([...formData]);
        // formData.append('update_comment', comment);
        axios.put('/update_comment/' + comment_id, formData).then(function(response) {
            console.log(response.data);
            $('#comment--info' + response.data.id).textContent = 'aaaaaa';
            alert('success');
        }).catch(function(error) {
            console.log(error);
        });
    });
</script>

<script>
    $(document).on('click', '#post__button', function(e) {
        e.preventDefault();

        let form = document.getElementById('post__main');

        let formData = new FormData(form);

        console.log([...formData]);

        axios.post('/post', formData).then(function(response) {
            console.log(response.data);

            $('#post__feed').prepend(
                '<div class="post__feed--item"><a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}"><div class="post__feed--item--head"><div class="post__feed--item--avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></div><div class="post__feed--item--info">{{ Auth::user()->name }}</div></div></a> <div><a href="/user/' +
                response.data.id + '">' +
                response.data.title + '</a></div><div class="post__feed--item--title">' +
                response
                .data.post +
                '</div><div class="post__feed--item--link"><div><img src="/storage/post_image/' +
                response.data.image_name + '" alt="Image"></div></div></div>'
            );

            document.getElementById("post__main").reset();
            document.getElementById("image_preview").src = " ";
            $(".post__content--box").hide();
            $(".overlay").hide();

            $('.show__modal').click(function() {
                $(".post__content--box").show();
                $(".overlay").show();
            });
        }).catch(function(error) {
            console.log(error);
        });
        // console.log(axiosAPI);
    });

    $(document).on('click', '#post__comment--button', function(e) {
        // $('#post__comment--button').submit(function(e) {
        e.preventDefault();
        let post_id = e.target.getAttribute('data-id');
        console.log(post_id);
        let comment = $('#post__comment' + post_id).val();
        console.log(comment);
        axios({
            method: "POST",
            url: "/comment/" + post_id,
            data: {
                comment: comment
            }
        }).then(function(response) {
            console.log(response.data);
            $('#comment' + post_id).prepend(
                '<li><div class="post__feed--main cmt_id' + response.data
                .id +
                '"><div class="post__feed--item--avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"alt="avatar"></div><div class="post__feed--main--box"><div class="post__feed--main--box2"><div class="post__feed--main--box3"><div class="post__feed--comment--info"><div>{{ Auth::user()->name }}</div><div id="comment--info' +
                response.data.id + '">' +
                response.data.comment +
                '</div></div><div class="toggle"></div><div class="post__feed--comment--button hidden"><div class="post__feed--comment--delete"><form action="/delete_comment/' +
                response.data.id +
                '" method="POST" id="comment__delete"> @csrf @method('DELETE')<div><button type="submit" id="comment__button--delete" data-id="' +
                response.data.id +
                '">Delete</button></div></form></div><div class="post__feed--comment--update"><button class="show__modal">Update</button><div class="modal2 hidden"><div class="modal__head"><button class="close__modal">&times;</button><h2>Chỉnh sửa bình luận</h2></div><div class="modal__box"><form action="/update_comment/' +
                response.data.id +
                '" method="POST" >@csrf<input type="text" name="update_comment" class="form__input" data-id="' +
                response.data.id + '" id="comment__content--update" placeholder="Content" value="' +
                response.data.comment +
                '" required /><input class="modal__button--update" type="submit" value="Lưu" data-id="' +
                response.data.id +
                '" id="comment__button--update"/></form></div></div><div class="overlay hidden"></div></div></div></div><div class="post__feed--reply"><form action="/reply_comment/' +
                response.data.id +
                '" method="POST">@csrf<textarea type="text" name="reply" placeholder="Viết phản hồi" class="post__feed--content--box" style="resize:none" col="1" required></textarea><button type="submit">Reply</button></form></div></div></div></li>'
            );
        }).catch(function(error) {
            console.log(error);
        });
    });
</script>

<script type="text/javascript">
    // const axios = require('axios');
    // let search = document.getElementById('search');
    // search.addEventListener('keyup', function() {
    //     let data = this.value;
    //     // let html = '<ul><li>' + data + '</li></ul>';
    //     // document.getElementById('search__result').innerHTML = html;
    //     // console.log(data);
    //     // $(document).on('click', '#btn_search', function(e) {
    //     // document.getElementById('btn_search').addEventListener('click', function(e) {
    //     // e.preventDefault();

    //     axios({
    //         method: "GET",
    //         url: '/search',
    //         headers: {
    //             "X-Requested-With": "XMLHttpRequest",
    //         },
    //         data: data
    //     }).then(function(response) {
    //         console.log(response);
    //         document.getElementById('search__result').innerHTML = response.data.name;
    //         // $('.search__result').html(html);
    //     }).catch(function(error) {
    //         console.log(error);
    //     });


    $('#search').on('keyup', function() {
        $('.search__result').hide();
        $value = $(this).val();

        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('.search__result').show();
                    $('.search__result').html(data);
                }
            });
        } else {
            $('.search__result').html('');
            $('.search__result').hide();
        }


    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // axios.get('/search', data).then(function(response) {
    //     console.log(response);
    //     // document.getElementById('search__result').innerText = '<ul><li>' + response.data.name +
    //     //     '</li></ul>';
    //     // $('.search__result').html(html);
    // }).catch(function(error) {
    //     console.log(error);
    // });

    // alert(results);
    // });
</script>

</html>
