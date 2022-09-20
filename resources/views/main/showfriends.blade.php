<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mainstyle.css') }}">
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
                        @endif
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
                    @if (Auth::user()->id != $user->id)
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-primary" type="submit">Nhắn tin</button>
                            </div>
                            <div class="p-2 bd-highlight">

                                {{-- @if (Auth::user()->id == $friend->user_id && $user->id == $friend->friend_id) --}}
                                @if ($friend != null)
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
                        <a href="#">Bạn bè</a>
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
    </main>

    <main>
        <div class="d-flex flex-column bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">Bạn bè</div>
                    <div class="p-2 bd-highlight">Flex item</div>
                    <div class="p-2 bd-highlight">Third flex item</div>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="d-flex bd-highlight justify-content-around">
                    <div class="p-2 w-50 bd-highlight">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="..." width="100px"
                                        height="100px">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">User name</h5>
                                        <p class="card-text">View this user
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-50 bd-highlight">Flex item</div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
