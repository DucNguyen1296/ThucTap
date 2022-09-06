<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/post_detail_style.css') }}">
    <title>{{ $post->title }}</title>
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
        <div class="container__advertise">

        </div>
        <div class="container__body">
            <div class="container__body--header">
                <div class="container__body--author--avatar">
                    <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}" alt="">
                </div>
                <div class="container__body--author--name">
                    {{ $user->name }}
                </div>
            </div>
            <article class="container__body--main">
                <h1>
                    {{ $post->title }}
                </h1>

                <div class="container__body--content">
                    {{ $post->post }}
                </div>
                <div>
                    @if ($post->link != null || $post->link_image != null)
                        <a href="{{ $post->link }}">{{ $post->link }}
                            <img src="{{ $post->link_image }}" alt="">
                        </a>
                    @endif

                    @if ($post->image_name != null)
                        <div>
                            <img src="{{ asset('/storage/post_image/' . $post->image_name) }}" alt="Image">
                        </div>
                    @endif
                </div>
            </article>
        </div>
        <div class="container__advertise">

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
