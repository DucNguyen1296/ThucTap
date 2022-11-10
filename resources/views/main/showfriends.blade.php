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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Fakebook</title>
</head>

<style>
    .btn-outline-secondary {
        width: 150px;
        height: 50px;
        border: none;
        color: #000;
    }
</style>

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
    <main>
        <div class="d-flex flex-column bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <nav class="navbar navbar-light bg-light">
                            <div class="container-fluid">
                                <div class="navbar-brand" href="#">
                                    <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                        alt="" width="80" height="80"
                                        class="d-inline-block align-text-top">
                                    {{ $user->name }}
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="d-flex">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}"
                            style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-secondary">Bài viết</button>
                        </a>
                        <a href="#" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary">Giới thiệu</button>
                        </a>
                        <a href="{{ route('user.friend.show', ['id' => Auth::user()->id]) }}"
                            style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary">Bạn bè</button>
                        </a>
                        <a href="#" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary">Ảnh</button>
                        </a>
                        @if (Auth::user()->id == $user->id)
                            <a href="{{ route('user.newsfeed', ['id' => Auth::user()->id]) }}"
                                style="text-decoration: none">
                                <button type="button" class="btn btn-outline-secondary">Your News Feed</button>
                            </a>
                        @endif
                        <a href="#" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary">Xem thêm</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main>
        <div class="d-flex flex-column bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <h2 class="p-2 bd-highlight">Bạn bè</h2>
                <div class="d-flex bd-highlight justify-content-around">
                    <div class="p-2 w-50 bd-highlight">
                        @foreach ($users as $us)
                            @foreach ($friends as $friend)
                                @if ($us->id == $friend->friend_id &&
                                    $friend->approved == 1 &&
                                    $us->id != Auth::user()->id &&
                                    $us->id != $user->id)
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('/storage/avatar/' . $us->avatars->avatar_name) }}"
                                                    class="img-fluid rounded-start" alt="..." width="100px"
                                                    height="100px">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $us->name }}</h5>
                                                    <p class="card-text">
                                                        <a
                                                            href="{{ route('user.profile.detail', ['id' => $us->id]) }}">View
                                                            profile</a>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    {{-- <div class="p-2 w-50 bd-highlight">Flex item</div> --}}
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
