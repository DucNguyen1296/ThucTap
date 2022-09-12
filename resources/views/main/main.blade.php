<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mainstyle.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fakebook</title>
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

    <main>
        <div class="post">
            <div class="post__advertise">

            </div>

            <div class="container">
                @if (Auth::check())
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
                        <div class="post__content--box modal hidden" id="post__content--box">
                            <div>
                                Tạo bài viết mới
                            </div>
                            <button class="close__modal">
                                &times;
                            </button>
                            <form action="/post" method="POST" enctype="multipart/form-data" id="post__button">
                                @csrf
                                <div>
                                    <input type="text" name="title" placeholder="Tiêu đề" id="post__title">
                                </div>
                                <div class="post__box">
                                    <textarea name="post" class="post__box--content" style="resize:none" cols="30" rows="5"
                                        placeholder="Bạn đang nghĩ gì?" id="post__text"></textarea>
                                </div>
                                <div class="post__url">
                                    <input class="post__url--preview" type="url" name="link" placeholder="Link"
                                        value="" id="post__link">

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
                        </div>
                        <div class="overlay hidden">
                        </div>
                    </div>
                @endif

                <div class="post__feed" id="post__feed">
                    @foreach ($users as $user)
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
                                        <textarea name="comment" id="" class="post__feed--content--box" style="resize:none"
                                            placeholder="Viết bình luận" col="1" required></textarea>
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
                                                                    <div class="post__feed--main--box3">

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
                                                                                                <button type="submit"
                                                                                                    id="comment__button--delete">
                                                                                                    Delete
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div
                                                                                        class="post__feed--comment--update">
                                                                                        <button class="show__modal">
                                                                                            Update
                                                                                        </button>
                                                                                        <div class="modal hidden">
                                                                                            <div class="modal__head">
                                                                                                <button
                                                                                                    class="close__modal">
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
                                                                                                    <input
                                                                                                        type="text"
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
                                                                                        <div class="overlay hidden">
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
                                                                                                <button type="submit"
                                                                                                    id="comment__button--delete">
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
                    @endforeach
                </div>
            </div>
            <div class="post__advertise">

            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script>
    let loadFile = function(event) {
        let image_preview = document.getElementById('image_preview');
        image_preview.src = URL.createObjectURL(event.target.files[0]);
        // console.log(image_preview);
    };
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $('#post__button').submit(function(e) {
    //     e.preventDefault();

    //     let title = $('#post__title').val();
    //     let post = $('#post__text').val();

    //     $.ajax({
    //         url: "{{ route('user.post') }}",
    //         type: "POST",
    //         data: {
    //             title: title,
    //             post: post
    //         },
    //         success: function(response) {
    //             if (response) {
    //                 $('#post__feed').prepend(
    //                     '<div class="post__feed--item"><a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}"><div class="post__feed--item--head"><div class="post__feed--item--avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></div><div class="post__feed--item--info">{{ Auth::user()->name }}</div></div></a> <div><a href="{{ route('default') }}">' +
    //                     response
    //                     .title + '</a></div><div class="post__feed--item--title">' +
    //                     response.post + '</div></div>');
    //                 $("#post__button")[0].reset();
    //                 $(".post__content--box").hide();
    //                 $(".overlay").hide();
    //                 // location.reload();
    //             }
    //             $('.show__modal').click(function() {
    //                 $(".post__content--box").show();
    //                 $(".overlay").show();
    //             });
    //         }
    //     });
    // });

    $(document).on('click', '#comment__button--delete', function(e) {
        e.preventDefault();


        let comment_id = $(this).data('id');
        console.log(comment_id);
        alert("Are You sure want to delete !");

        $.ajax({

            url: "{{ route('user.comment.delete', ['id' => $comment->id]) }}" + '/' + comment_id,
            type: "DELETE",
            success: function(response) {
                if (response) {
                    $('.post__feed--comment--info').remove();
                    alert('success');
                }
            }
        });
    });
</script>

<script>
    $('#post__button').submit(function(e) {
        e.preventDefault();

        let title = $('#post__title').val();
        let post = $('#post__text').val();

        let axiosAPI = axios({
            method: "POST",
            url: "{{ route('user.post') }}",
            data: {
                title: title,
                post: post
            }
        }).then(function(response) {
            console.log(response.data);
            $('#post__feed').prepend(
                '<div class="post__feed--item"><a href="{{ route('user.profile.detail', ['id' => Auth::user()->id]) }}"><div class="post__feed--item--head"><div class="post__feed--item--avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></div><div class="post__feed--item--info">{{ Auth::user()->name }}</div></div></a> <div><a href="{{ route('default') }}">' +
                response.data.title + '</a></div><div class="post__feed--item--title">' + response
                .data.post +
                '</div></div>');
            $("#post__button")[0].reset();
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
</script>

{{-- <script>
    function loadDoc() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById('post__feed').innerHTML = this.responseText;
        }
        xhttp.open('GET', 'main.blade.php');
        xhttp.send();
        console.log(xhttp);
    }
</script> --}}
@if (session()->has('comment_session'))
    <script>
        alert('{{ session('comment_session') }}');
    </script>
@endif

</html>
