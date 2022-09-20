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
    <title>Timeline</title>
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
    <main class="container">
        @if ($user1->id == $friend->user_id)
            @foreach ($posts as $post)
                @if ($post->user_id == $user1->id || $post->user_id == $user2->id)
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">Flex item 1</div>
                                    <div class="p-2 bd-highlight">
                                        <div class="d-flex flex-column bd-highlight mb-3">
                                            <div class="p-2 bd-highlight">
                                                Flex item 1
                                            </div>
                                            <div class="p-2 bd-highlight">Flex item 2</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->post }}</p>
                            </div>
                            <div>
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
                    </div>
                    <div>
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </main>
    <footer>

    </footer>
</body>

</html>
