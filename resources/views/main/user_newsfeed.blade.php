<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/mainstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/newsfeedstyle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Fakebook</title>

    <style>
        .btn-outline-secondary {
            width: 145px;
            height: 50px;
            border: none;
            color: #000;
        }
    </style>
</head>

<body>
    <header id="navbar">
        <div class="navigation">
            <nav>
                <div class="nav__bar">
                    <!-- nav header -->
                    <div class="nav__header">
                        <a href="{{ route('user.newsfeed', ['id' => Auth::user()->id]) }}">
                            <img src="{{ asset('/storage/logo/fakebook.png') }}" alt="logo" class="logo" />
                        </a>

                        <div class="search__box">
                            <input class="form-control me-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                                id="search" name="search">
                            <div class="form__group">
                                <ul class="search__result">

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- link -->
                    <ul class="link">
                        <li>
                            <a href="https://www.facebook.com/">
                                <button type="button" class="btn btn-primary btn-lg">
                                    <i class="fa-sharp fa-solid fa-house"></i>
                                </button>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.youtube.com/">
                                <button type="button" class="btn btn-primary btn-lg">
                                    <i class="fa-brands fa-youtube"></i>
                                </button>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <button type="button" class="btn btn-primary btn-lg">
                                    <i class="fa-sharp fa-solid fa-people-group"></i>
                                </button>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <button type="button" class="btn btn-primary btn-lg">
                                    <i class="fa-solid fa-book"></i>
                                </button>
                            </a>
                        </li>

                    </ul>
                    <div class="main__login">
                        <div class="dropdown" style="margin-right:10px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-header">Chat</div>
                                @foreach ($userData->where('id', '!=', Auth::user()->id) as $key => $value)
                                    <a href="{{ url('/chat/' . $value->id) }}" class="dropdown-item chat-item">
                                        <li>
                                            <img src="{{ asset('/storage/avatar/' . $value->avatars->avatar_name) }}"
                                                alt="Profile Picture" width="50" height="50">
                                            <div style="display: inline-block; font-weight:bold;" class="friend-item">
                                                {{ $value->name }}

                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown" style="margin-right:10px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bell"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-header">
                                    Friend Request
                                </div>
                                @if (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', $user->id)->isNotEmpty())
                                    @foreach (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id) as $friendFrom)
                                        <li class="dropdown-item friend-menu">
                                            <div class="d-flex flex-row">
                                                <img src="{{ asset('/storage/avatar/' . $friendFrom->users->avatars->avatar_name) }}"
                                                    alt="Profile Picture" width="50" height="50">
                                                <div style="display: inline-block; font-weight:bold;"
                                                    class="friend-item">
                                                    {{ $friendFrom->users->name }}
                                                    <div data-userid="{{ $friendFrom->users->id }}">
                                                        <div class="d-flex flex-row friend-button ">
                                                            <form
                                                                action="{{ route('user.friend.accept', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-primary btn-sm request"
                                                                    type="submit">
                                                                    Xác nhận
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('user.friend.decline', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-secondary btn-sm request"
                                                                    type="submit">
                                                                    Từ chối
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
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


                        {{-- <div class="main__login--user">
                            <a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}">
                                <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                    alt="">
                            </a>
                            <a href="/logout"> /Đăng xuất</a>
                        </div> --}}

                        <div class="dropdown main__login--user">
                            <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                    alt="">
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ asset('/user/' . Auth::user()->id) }}">
                                        <div class="d-flex flex-row">
                                            <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                                alt="">
                                            <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ asset('/user/' . Auth::user()->id) }}"><i
                                            class="fa-solid fa-house-user"></i> Xem
                                        trang
                                        cá nhân</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-circle-info"></i>
                                        Điều khoản sử dụng</a></li>
                                <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i>
                                        Đăng
                                        xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    {{-- <main class="container container__body"> --}}
    <main class="container container__body">

        <div class="post">
            <div class="post__advertise">
                <div class="advertisement-left">
                    <div class="list-group">
                        <a href="{{ asset('/user/' . Auth::user()->id) }}"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex flex-row">
                                <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                    alt="">
                                <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                            </div>
                        </a>
                        <a href="{{ route('user.friend.show', ['id' => Auth::user()->id]) }}"
                            class="list-group-item list-group-item-action"><i class="fa-solid fa-user-group"></i> Bạn
                            bè</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-sharp fa-solid fa-people-group"></i> Nhóm</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-store"></i> Mua bán</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-video"></i> Watch</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-clock"></i> Kỷ niệm</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-flag"></i>
                            Trang</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-gamepad"></i> Game</a>
                    </div>
                    <div class="list-group" style="margin-top:10px;">
                        <div style="font-weight:bold; ">Lối tắt riêng</div>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-coins"></i> Thị trường tiền ảo</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-arrow-trend-up"></i> Chứng khoán và đầu tư</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="fa-solid fa-lightbulb"></i> Ý tưởng độc đáo</a>

                    </div>
                </div>


            </div>
            <div class="containers">
                <div class="carousel-index">
                    <div class="d-flex flex-column carousel-main">
                        <div class="d-flex flex-row carousel-button">
                            <div class="btn-group d-flex flex-row" role="group"
                                aria-label="Basic outlined example">
                                <a href="#" style="text-decoration: none;">
                                    <button type="button" class="btn btn-outline-secondary active"
                                        aria-pressed="true">Bài viết</button>
                                </a>
                                <a href="#" style="text-decoration: none">
                                    <button type="button" class="btn btn-outline-secondary">Video</button>
                                </a>
                                <a href="#" style="text-decoration: none">
                                    <button type="button" class="btn btn-outline-secondary">Quảng cáo</button>
                                </a>
                            </div>
                        </div>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex flex-row justify-content-between">
                                        <img src="/storage/test/anh_cho_2.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                        <img src="/storage/test/anh_cho_1.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                        <img src="/storage/test/anh_meo_1.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex flex-row justify-content-between">
                                        <img src="/storage/test/anh_cho_1.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                        <img src="/storage/test/anh_meo_1.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                        <img src="/storage/test/anh_meo_2.jpg" class="d-block" height="100px"
                                            width="100px" alt="...">
                                    </div>
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
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
                        <div class="d-flex flex-row">
                            <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                alt="">
                            <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                        </div>
                        <form action="/post" method="POST" enctype="multipart/form-data" id="post__main">
                            @csrf
                            {{-- <div class="post__content--box--title">
                                <input type="text" name="title" placeholder=" Tiêu đề" id="post__title">
                            </div> --}}
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder=" Tiêu đề"
                                    id="post__title">
                            </div>
                            {{-- <div class="post__box">
                                <textarea name="post" class="post__box--content" style="resize:none" cols="30" rows="5"
                                    placeholder=" Bạn đang nghĩ gì?" id="post__text"></textarea>
                            </div> --}}
                            <div class="mb-3">
                                <textarea name="post" class="form-control" id="post__text" rows="3" placeholder=" Bạn đang nghĩ gì?"
                                    style="resize:none"></textarea>
                            </div>
                            {{-- <div class="post__url">
                                <input class="post__url--preview" type="url" name="link"
                                    placeholder=" Thêm link bài viết" value="" id="post__link">
                            </div> --}}
                            <div class="mb-3">
                                <input type="url" name="link" class="form-control" id="post__link"
                                    placeholder=" Thêm link bài viết">
                            </div>
                            <div>
                                <img id="image_preview" height="50px" width="50px" />
                            </div>
                            {{-- <div class="btn btn__post">
                                <label for="image">Add image to your Post</label>
                                <input class="btn__post--img" id="post__image" type="file" name="image"
                                    onchange="loadFile(event)" />
                            </div> --}}
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Thêm ảnh vào bài viết</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file"
                                    name="image" onchange="loadFile(event)" />
                            </div>

                            <div class="btn btn__post">
                                <input class="btn__post--post" type="submit" value="Đăng" id="post__button" />
                            </div>
                        </form>
                    </div>
                    <div class="overlay hidden">
                    </div>
                </div>
                <div class="post__feed" id="post__feed">

                    @foreach ($postDatas as $post)
                        {{-- @foreach ($posts as $post) --}}
                        @foreach ($friends as $friend)
                            {{-- @if ($friends->isEmpty() && $post->user_id == Auth::user()->id) --}}

                            {{-- @foreach ($friendsFrom as $friendFrom) --}}
                            @if (($post->user_id == $friend->friend_id && $friend->approved == 1 && $post->user->status == 1) ||
                                // ($post->user_id == $friend->user_id && $friend->approved == 1) ||
                                ($post->user_id == Auth::user()->id && $post->user->status == 1))
                                <div class="card__content">
                                    <div class="card card__main">
                                        <div class="card-header">
                                            <div class="d-flex flex-row bd-highlight mb-1">
                                                <div class="p-2 bd-highlight card-header-img">
                                                    <img src="{{ asset('/storage/avatar/' . $post->user->avatars->avatar_name) }}"
                                                        alt="avatar">

                                                </div>
                                                <div class="p-1 bd-highlight">
                                                    <div class="d-flex flex-column bd-highlight mb-3">
                                                        <div class="p-1 bd-highlight" style=" font-weight:bold;">
                                                            <a href="{{ asset('/user/' . $post->user->id) }}"
                                                                style="text-decoration: none;color: #000;">
                                                                {{ $post->user->name }}
                                                            </a>
                                                        </div>
                                                        <div class="p-1 bd-highlight">
                                                            {{ $post->created_at->diffForHumans() }}
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



                                        <div class="post__feed--footer">
                                            <div class="d-flex justify-content-evenly footer__main">
                                                <div class="p-2 bd-highlight footer__button">
                                                    @if ($likesPost->isEmpty())
                                                        <form
                                                            action="{{ route('user.like.post', ['id' => $post->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="fa-solid fa-thumbs-up"></i>
                                                                Thích
                                                            </button>
                                                        </form>
                                                    @else
                                                        @if (Auth::user()->likes_post->where('post_id', $post->id)->isNotEmpty())
                                                            @foreach (Auth::user()->likes_post->where('post_id', $post->id) as $likePost)
                                                                <form
                                                                    action="{{ route('user.delete.like.post', ['id' => $likePost->id]) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-secondary"
                                                                        style="color:blue">
                                                                        <i class="fa-solid fa-thumbs-up"></i>
                                                                        Thích
                                                                    </button>
                                                                </form>
                                                            @endforeach
                                                        @else
                                                            <form
                                                                action="{{ route('user.like.post', ['id' => $post->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-secondary">
                                                                    <i class="fa-solid fa-thumbs-up"></i>
                                                                    Thích
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="p-2 bd-highlight footer__button">

                                                    <button class="btn btn-secondary btn__comment">
                                                        <i class="fa-solid fa-comment"></i>
                                                        Bình luận
                                                    </button>
                                                </div>
                                                <div class="p-2 bd-highlight footer__button">
                                                    <button class="btn btn-secondary">
                                                        <i class="fa-solid fa-share"></i>
                                                        Chia sẻ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="post__feed--comment hidden">
                                            <div class="post__feed--content">
                                                <div class="d-flex flex-row">
                                                    <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                                        alt="Image" height="50px" width="50px">
                                                    <form
                                                        action="{{ route('user.post.comment', ['id' => $post->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input name="comment" id="post__comment{{ $post->id }}"
                                                            class="post__feed--content--box"placeholder="Viết bình luận..."
                                                            required>
                                                        {{-- <div>
                                                        <img id="image_preview_2" height="50px" width="50px" />
                                                    </div>
                                                    <div class="btn btn__post">
                                                      
                                                        <input class="btn__post--post" type="file" name="image"
                                                            onchange="loadFile(event)" />
                                                        <i class="fa-solid fa-image"></i>
                                                    </div> --}}
                                                        <input type="submit" value="Comment"
                                                            id="post__comment--button" data-id="{{ $post->id }}"
                                                            style="display:none;">
                                                    </form>

                                                </div>
                                            </div>
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

                                                                        <div class="post__feed--main--box3">

                                                                            <div class="post__feed--comment--info">
                                                                                <div style="font-weight:bold;">
                                                                                    {{ $us->name }}
                                                                                </div>
                                                                                <div
                                                                                    id="comment--info{{ $comment->id }}">
                                                                                    {{ $comment->comment }}
                                                                                </div>
                                                                            </div>



                                                                            @if (Auth::user()->id == $comment->user_id)
                                                                                <div class="toggle">
                                                                                </div>
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
                                                                                                    class="btn btn-primary"
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
                                                                                        {{-- <button
                                                                                            class="btn btn-primary show__modal">
                                                                                            Update
                                                                                        </button>
                                                                                        <div style="width:100%;"
                                                                                            class="comment__content--box modal2 hidden">
                                                                                            <div class="modal__head">
                                                                                                <button
                                                                                                    class="close__modal">
                                                                                                    &times;
                                                                                                </button>
                                                                                                <h2>
                                                                                                    Chỉnh sửa
                                                                                                    bình luận
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div class="modal__box">
                                                                                                <form
                                                                                                    action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                                    method="POST"
                                                                                                    id="comment__update{{ $comment->id }}">
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
                                                                                        <div class="overlay hidden">
                                                                                        </div> --}}
                                                                                        <!-- Modal -->
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#exampleModal{{ $comment->id }}">
                                                                                            Update
                                                                                        </button>

                                                                                        <!-- Modal -->
                                                                                        <form
                                                                                            action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                            method="POST"
                                                                                            id="comment__update{{ $comment->id }}">
                                                                                            @method('PUT')
                                                                                            @csrf
                                                                                            <div class="modal fade comment__content--box"
                                                                                                id="exampleModal{{ $comment->id }}"
                                                                                                tabindex="-1"
                                                                                                aria-labelledby="exampleModalLabel"
                                                                                                aria-hidden="true">
                                                                                                <div
                                                                                                    class="modal-dialog">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <h5 class="modal-title"
                                                                                                                id="exampleModalLabel">
                                                                                                                Chỉnh
                                                                                                                sửa
                                                                                                                bình
                                                                                                                luận
                                                                                                            </h5>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn-close"
                                                                                                                data-bs-dismiss="modal"
                                                                                                                aria-label="Close"></button>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-body">
                                                                                                            <div
                                                                                                                class="mb-3">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="update_comment"
                                                                                                                    class="form-control"
                                                                                                                    data-id="{{ $comment->id }}"
                                                                                                                    id="comment__content--update{{ $comment->id }}"
                                                                                                                    placeholder="Content"
                                                                                                                    value="{{ $comment->comment }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-footer">
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                class="btn btn-primary modal__button--update"
                                                                                                                data-id="{{ $comment->id }}"
                                                                                                                id="comment__button--update">Thay
                                                                                                                đổi</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            @elseif(Auth::user()->id == $post->user_id)
                                                                                <div class="toggle ">

                                                                                </div>
                                                                                {{-- <div
                                                                                    class="dropdown toggle post__feed--comment--button hidden">
                                                                                    <button
                                                                                        class="btn btn-secondary dropdown-toggle"
                                                                                        type="button"
                                                                                        id="dropdownMenuButton1"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false">
                                                                                    </button>
                                                                                    <ul class="dropdown-menu"
                                                                                        aria-labelledby="dropdownMenuButton1">
                                                                                        <li><a class="dropdown-item"
                                                                                                href="#">Action</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="#">Another
                                                                                                action</a></li>
                                                                                        <li><a class="dropdown-item"
                                                                                                href="#">Something
                                                                                                else here</a></li>
                                                                                    </ul>
                                                                                </div> --}}
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
                                                                                                    class="btn btn-primary"
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

                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-row bd-highlight comment-footer">
                                                                            <div
                                                                                class="p-1 bd-highlight comment-footer-like">
                                                                                Thích
                                                                            </div>
                                                                            <div
                                                                                class="p-1 bd-highlight comment-footer-comment">
                                                                                Phản hồi
                                                                            </div>
                                                                            <div
                                                                                class="p-1 bd-highlight comment-footer-time">
                                                                                {{ $comment->created_at->diffForHumans() }}
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="post__feed--reply reply-box hidden">
                                                                            <div class="d-flex flex-row">
                                                                                <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                                                                    alt="Image">

                                                                                <form
                                                                                    action="{{ route('user.reply.create', ['id' => $comment->id]) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="text"
                                                                                        name="reply"
                                                                                        placeholder="Viết phản hồi..."
                                                                                        class="post__feed--content--box"
                                                                                        required />
                                                                                    <button type="submit"
                                                                                        class="hidden">
                                                                                        Reply
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                        <div>
                                                                            <ul>
                                                                                {{-- @foreach ($users as $uss) --}}
                                                                                @foreach ($comment->replies as $reply)
                                                                                    {{-- @if ($uss->id == $reply->user_id) --}}
                                                                                    <li>
                                                                                        <div
                                                                                            class="post__feed--reply reply_id{{ $reply->id }}">
                                                                                            <div
                                                                                                class="post__feed--item--avatar">
                                                                                                <img src="{{ asset('/storage/avatar/' . $reply->user->avatars->avatar_name) }}"
                                                                                                    alt="avatar">
                                                                                            </div>
                                                                                            <div
                                                                                                class="post__feed--reply--box">
                                                                                                <div
                                                                                                    class="post__feed--reply--info">
                                                                                                    <div
                                                                                                        style="font-weight:bold;">
                                                                                                        {{ $reply->user->name }}
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        {{ $reply->reply }}
                                                                                                    </div>
                                                                                                </div>
                                                                                                @if ($reply->comment->user_id == Auth::user()->id)
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
                                                                                                                    <button
                                                                                                                        id="reply__button--delete"
                                                                                                                        type="submit"
                                                                                                                        data-id="{{ $reply->id }}">Delete</button>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif

                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    {{-- @endif --}}
                                                                                @endforeach
                                                                                {{-- @endforeach --}}
                                                                            </ul>
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
                        {{-- @endforeach --}}
                        {{-- @endforeach --}}
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="post__advertise">
            <div class="d-flex flex-column mb-3 bd-highlight advertisement-right">
                <div class="d-flex flex-column mb-3 bd-highlight advertisement-right-content ">
                    <div class="p-2 bd-highlight">
                        <h5>Quảng cáo</h5>
                    </div>
                    <div class="p-2 bd-highlight advertisement-element" aria-label="Basic outlined example">
                        <a href="{{ asset('http://127.0.0.1:8000/news24h') }}" style="text-decoration: none;">
                            <div class="d-flex flex-row btn btn-outline-primary">
                                <img src="{{ asset('/storage/adv/blog.png') }}"alt="adv">
                                <div class="d-flex flex-column ">
                                    <div class="advertisement-content">Tin tức 24h | News24h</div>
                                    <div class="advertisement-link">news24h.com.vn</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="p-2 bd-highlight advertisement-element" aria-label="Basic outlined example">
                        <a href="{{ asset('http://127.0.0.1:8000/shopper') }}" style="text-decoration: none;">
                            <div class="d-flex flex-row btn btn-outline-primary">
                                <img src="{{ asset('/storage/adv/shopper.jpg') }}"alt="adv">
                                <div class="d-flex flex-column">
                                    <div class="advertisement-content">Mua sắm thỏa thích | Shopper Việt Nam</div>
                                    <div class="advertisement-link">shoppervn.vn</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="p-2 bd-highlight advertisement-element" aria-label="Basic outlined example">
                        <a href="{{ asset('http://127.0.0.1:8000/book247') }}" style="text-decoration: none;">
                            <div class="d-flex flex-row btn btn-outline-primary">
                                <img src="{{ asset('/storage/adv/book.jpg') }}"alt="adv">
                                <div class="d-flex flex-column">
                                    <div class="advertisement-content">Sách truyện online | Book247 </div>
                                    <div class="advertisement-link">book247.com.vn</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column birthday" aria-label="Basic outlined example">
                    <h5 class="birthday-header">Sinh nhật</h5>
                    <a href="{{ asset('http://127.0.0.1:8000/book247') }}" style="text-decoration: none;">
                        <div class="d-flex flex-row btn btn-outline-primary birthday-content">
                            <div><i class="fa-solid fa-cake-candles"></i> Hôm nay là sinh nhật của <div
                                    style="font-weight:bold;"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="d-flex flex-column chat-box">
                    <h5>Chat với bạn bè</h5>
                    <div class="list-group chat-main">
                        @foreach ($userData->where('id', '!=', Auth::user()->id) as $key => $value)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex flex-row">
                                    <img src="{{ asset('/storage/avatar/' . $value->avatars->avatar_name) }}"
                                        alt="">
                                    <div class="dropdown-user-info">{{ $value->name }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<footer>

</footer>
</body>

{{-- @if (session()->has('correct'))
<script>
    alert('{{ session('correct') }}');
</script>
@endif --}}


<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/advertisement.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/userNewsfeed.js') }}"></script>

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
        confirm("Are You sure want to delete this Comment !");
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

        let form = document.getElementById('comment__update' + comment_id);
        console.log(form);
        let formData = new FormData(form);

        console.log([...formData]);
        // formData.append('update_comment', comment);
        axios.put('/update_comment/' + comment_id, {
            comment: comment
        }).then(function(response) {
            console.log(response.data.data);

            $('#comment--info' + comment_id).html(response.data.data);
            document.getElementById("comment__update" + comment_id).reset();
            $(".comment__content--box").reset();
            $(".overlay").hide();
            // alert('success');
        }).catch(function(error) {
            console.log(error);
        });
    });

    document.getElementById('reply__button--delete').addEventListener('click', function(e) {
        e.preventDefault();
        let reply_id = e.target.getAttribute("data-id");
        // console.log(reply_id);
        confirm("Are You sure want to delete this Reply !");
        axios.delete('/delete_reply/' + reply_id).then(function(response) {
            $('.reply_id' + reply_id).remove();
        }).catch(function(error) {
            console.log(error);
        })
    })
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
                '<div class="post__feed--item"><a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}"><div class="post__feed--item--head"><div class="post__feed--item--avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></div><div class="post__feed--item--info">{{ Auth::user()->name }}</div></div></a> <div>' +
                response.data.title + '</div><div class="post__feed--item--title">' +
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
                '">Delete</button></div></form></div><div class="post__feed--comment--update"><button class="show__modal">Update</button><div class="comment__content--box modal2 hidden"><div class="modal__head"><button class="close__modal">&times;</button><h2>Chỉnh sửa bình luận</h2></div><div class="modal__box"><form action="/update_comment/' +
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
</script>

{{-- <script type="text/javascript">
    $('body').click(function() {
        data = 'click click';
        axios.post('/click', data).then(function(response) {
            // console.log(response);
        }).catch(function(error) {
            console.log(error);
        });
    });
</script>

<script type="text/javascript">
    window.onscroll = function() {
        data = 'scroll scroll';
        axios.post('/scroll', data).then(function(response) {
            // console.log(response);
        }).catch(function(error) {
            console.log(error);
        })
    };
</script> --}}

</html>
