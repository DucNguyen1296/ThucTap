<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Thông tin User</title>
</head>

<body>
    {{-- <a href="{{route('profile',['name'=>$name->name])}}"></a> --}}
    <div class="nav">
        <nav>
            <div class="nav__header">
                <h2>
                    <a href="/main">Trang chủ</a>
                </h2>
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
            <div>
                <form action="/avatar" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="btn btn__avatar">
                        <label for="avatar_input"><i class="fa-solid fa-camera"></i></label>
                        <input id="avatar_input" type="file" name="avatar" style="display:none; visibility: none" />
                    </div>
                    <div></div>
                    <div class="btn btn__avatar">
                        <input class="btn__post--upload" type="submit" value="Đăng" />
                    </div>
                </form>
                <div class="avatar__img">
                    <img src="{{ asset('/storage/avatar/' . $avatar->avatar_name) }}" alt="Your avatar">
                </div>
            </div>

        </div>
        <div class="post">
            <div class="post__header">
                {{ $user->name }} ơi, bạn đang nghĩ gì thế?
            </div>
            <div>
                <form action="/post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="text" name="title" placeholder="Tiêu đề">
                    </div>
                    <div class="post__box">
                        <textarea name="post" class="post__box--content" style="resize:none" cols="30" rows="5"
                            placeholder="Bạn đang nghĩ gì?" id="post__text"></textarea>
                    </div>
                    <div class="post__url">
                        <input class="post__url--preview" type="url" name="link" placeholder="Link"
                            value="">

                    </div>
                    <div>
                        <img id="image_preview" height="50px" width="50px" />
                    </div>
                    <div class="btn btn__post">
                        <label for="image">Add image to your Post</label>
                        <input class="btn__post--post" id="image" type="file" name="image"
                            onchange="loadFile(event)" />
                    </div>

                    <div class="btn btn__post">
                        <input class="btn__post--post" type="submit" value="Post" />
                    </div>

                </form>
                {{-- <form action="/upload" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="btn btn__post">
                        <label for="">Add image</label>
                        <input class="btn__post--post" type="file" name="image_name" />
                    </div>
                    <div class="btn btn__post">
                        <input class="btn__post--upload" type="submit" value="Post image" />
                    </div>
                </form> --}}
            </div>
            <div class="post__show">
                <div class="post__show--header">
                    Your posts
                </div>
                @foreach ($post as $pt)
                    <div class="post__row">
                        <div class="post__row--head">
                            <div class="post__row--head--avatar">
                                <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                    alt="avatar">
                            </div>
                            <div class="post__row--head--info">
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="post__row--title">
                            {{ $pt->title }}
                        </div>

                        <div class="post__row--content">

                            {{-- <script>
                                urlify({{ $pt->post }})
                            </script> --}}

                            {{ $pt->post }}


                        </div>
                        @if ($pt->link != null)
                            <div class="post__row--link">
                                <a href="{{ $pt->link }}">{{ $pt->link }}
                                    <div class="post__row--link----image">
                                        <img src="{{ $pt->link_image }}" alt="" />
                                        <div></div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if ($pt->image_name != null)
                            <div class="post__row--image">
                                <img src="{{ asset('/storage/post_image/' . $pt->image_name) }}" alt="Image" />
                            </div>
                        @endif
                        <div class="post__row--button">
                            <div class="post__row--update">
                                <form action="{{ url('/post', ['id' => $pt->id]) }}">
                                    @csrf
                                    <input type="submit" value="Update post">
                                </form>
                            </div>
                            <div class="post__row--delete">
                                <form action="{{ route('user.post.delete', ['id' => $pt->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div>
                                        <input type="submit" value="Delete post">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="image__show">
            <div class="image__show--header">
                Your images
            </div>
            @foreach ($file as $fl)
                <img class="image__show--element" src="{{ asset('/storage/file_upload/' . $fl->file_name) }}"
                    height="150px" width="200px" alt="Your picture">
                <form action="{{ route('user.file.delete', ['id' => $fl->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                        <input type="submit" value="Delete">
                    </div>
                </form>

                <form action="{{ route('user.file.update', ['id' => $fl->id]) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="btn btn__post">
                        <label for=""></label>
                        <input class="btn__post--post" type="file" name="update_img" required />
                    </div>
                    <div class="btn btn__post">
                        <input class="btn__post--upload" type="submit" value="Update Image" />
                    </div>
                </form>
            @endforeach
        </div> --}}
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    let loadFile = function(event) {
        let image_preview = document.getElementById('image_preview');
        image_preview.src = URL.createObjectURL(event.target.files[0]);
        // console.log(image_preview);
    };

    function urlify(text) {
        let urlRegex = /(https?:\/\/[^\s]+)/g;
        return text.replace(urlRegex, function(url) {
            return '<a href="' + url + '">' + url + '</a>';
        });
    }

    function getUrl(url) {
        let url_preview = document.querySelector('.post__url--preview');
        let click_preview = document.querySelector('.view__click');
        click_preview.addEventListener('click', function() {
            console.log(url_preview.getAtrribute('id'));
        });
    }
</script>



</html>
