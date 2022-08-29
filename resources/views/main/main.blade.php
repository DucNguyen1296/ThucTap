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
                        <img src="image/logo.jpg" alt="logo" class="logo" />
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
                                <a href="/profile"> {{ Auth::user()->name }}</a>
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
        <div class="post__feed">
            @foreach ($users as $user)
                @foreach ($user->posts as $post)
                    <div class="post__feed--item">
                        <div class="post__feed--item----info">
                            {{ $user->name }}
                        </div>
                        <div class="post__feed--item----title">
                            {{ $post->post }}
                        </div>
                        <div class="post__feed--item----image">
                            @if ($post->image_name != null)
                                <img src="{{ asset('/storage/post_image/' . $post->image_name) }}" alt="Image"
                                    height="150px" width="200px">
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </main>

    <footer>

    </footer>
</body>

</html>
