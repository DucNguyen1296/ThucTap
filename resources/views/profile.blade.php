<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Thông tin User</title>
</head>

<body>
    {{-- <a href="{{route('profile',['name'=>$name->name])}}"></a> --}}
    <div class="nav">
        <nav>
            <div class="nav__header">
                <h2>Xin chào {{ $user->name }} </h2>
                <div class="nav__link">
                    <ul>
                        <li>
                            <a href="{{ url('/editprofile') }}">Thay đổi thông tin cá nhân của bạn</a>
                        </li>
                        <li>
                            <a href="{{ url('/change_password') }}">Thay đổi mật khẩu cá nhân</a>
                        </li>
                        <li>
                            <a href="{{ url('/profile/show') }}">Xem thông tin cá nhân</a>
                        </li>
                        <li>
                            <a href="/logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="user__main">
        <div class="user__profile">
            <div class="user__profile--header">
                <h2>Welcome to Laravel {{ $user->name }} </h2>
            </div>
            <div class="user__profile--info">
                <div class="row">
                    <div class="row__one">
                        Email:
                    </div>
                    <div class="row__two">
                        {{ $user->email }}
                    </div>
                </div>
                <div class="row">
                    <div class="row__one">
                        Your ID:
                    </div>
                    <div class="row__two">
                        {{ $user->id }}
                    </div>
                </div>
                <div class="row">
                    <div class="row__one">
                        Date Of Birth:
                    </div>
                    <div class="row__two">
                        {{ $user->date }}
                    </div>
                </div>
                <div class="row">
                    <div class="row__one">
                        Location:
                    </div>
                    <div class="row__two">
                        {{ $user->location }}
                    </div>
                </div>
                <div class="row">
                    <div class="row__one">
                        Your title:
                    </div>
                    <div class="row__two">
                        {{ $user->title }}
                    </div>
                </div>
            </div>
        </div>
        <div class="post">
            <div class="post__header">
                {{ $user->name }} ơi, bạn đang nghĩ gì thế?
            </div>
            <div>
                <form action="/post" method="POST">
                    @csrf
                    <div class="post__box">
                        <textarea name="post" class="post__box--content" style="resize:none" cols="30" rows="5"
                            placeholder="Bạn đang nghĩ gì?"></textarea>
                    </div>
                    <div class="btn btn__post">
                        <input class="btn__post--post" type="submit" value="Đăng" />
                    </div>


                </form>
                <form action="/upload" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="btn btn__post">
                        <label for="">Add image</label>
                        <input class="btn__post--post" type="file" name="image" />
                    </div>
                    <div class="btn btn__post">
                        <input class="btn__post--upload" type="submit" value="Đăng" />
                    </div>
                </form>
            </div>
            <div class="post__show">
                @foreach ($data as $dt)
                    {{ $dt->post }}.</br>
                @endforeach
            </div>
        </div>
        <div class="#">
            Hello
        </div>
    </div>
</body>
@if (session()->has('correct'))
    <script>
        alert('{{ session('correct') }}');
    </script>
@endif

@if (session()->has('change_profile'))
    <script>
        alert('{{ session('change_profile') }}');
    </script>
@endif

@if (session()->has('change_password'))
    <script>
        alert('{{ session('change_password') }}');
    </script>
@endif

</html>
