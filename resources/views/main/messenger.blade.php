<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/messengerstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/mainstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/newsfeedstyle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Fakebook</title>
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
                                @foreach ($userData->where('id', '!=', Auth::user()->id) as $user)
                                    <a href="{{ url('/chat/' . $user->id) }}" class="dropdown-item chat-item">
                                        <li>
                                            <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                                alt="Profile Picture" width="50" height="50">
                                            <div style="display: inline-block; font-weight:bold;" class="friend-item">
                                                {{ $user->name }}
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
                                @if (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->isNotEmpty())
                                    @foreach (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id) as $friendFrom)
                                        <li class="dropdown-item friend-menu">
                                            <div class="d-flex flex-row">
                                                <img src="{{ asset('/storage/avatar/' . $friendFrom->users->avatars->avatar_name) }}"
                                                    alt="Profile Picture" width="50" height="50">
                                                <div style="display: inline-block; font-weight:bold;">
                                                    {{ $friendFrom->users->name }}
                                                    <div data-userid="{{ $friendFrom->users->id }}">
                                                        <div class="d-flex flex-row friend-button ">
                                                            <form
                                                                action="{{ route('user.friend.accept', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-success btn-sm request"
                                                                    type="submit">
                                                                    Accept
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('user.friend.decline', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm request"
                                                                    type="submit">
                                                                    Decline
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
            </nav>
        </div>
        <div class="container-sm">
            <div class="msg-header">
                <div class="msg-header-img">
                    <img src="{{ asset('/storage/avatar/' . $userChat->avatars->avatar_name) }}" alt="">
                </div>
                <div class="actived">
                    <h4>{{ $userChat->name }}</h4>
                    <h6>{{ $userChat->last_active->diffForHumans() }}</h6>
                </div>
                <div class="header-icons">
                    <i class="fa-solid fa-phone"></i>
                    <i class="fa-solid fa-video"></i>
                    <i class="fa-solid fa-circle-info"></i>
                </div>
            </div>
            <div class="chat-page">
                <div class="msg-inbox">
                    <div class="chats">
                        <div class="msg-page" id="msg-box">
                            @foreach ($messengers as $messenger)
                                @if ($messenger->friend_id == Auth::user()->id)
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            <img src="{{ asset('/storage/avatar/' . $userChat->avatars->avatar_name) }}"
                                                alt="">
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                                <p>{{ $messenger->messenger }}</p>
                                                <span
                                                    class="time">{{ $messenger->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-msg">
                                            <p>{{ $messenger->messenger }}</p>
                                            <span class="time">{{ $messenger->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="outgoing-chats-img">
                                            <img src="{{ asset('/storage/avatar/' . $userlog->avatars->avatar_name) }}"
                                                alt="">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="msg-bottom">
                    <div class="bottom-icons">
                        <i class="fa-solid fa-plus-circle"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-solid fa-face-smile"></i>
                    </div>

                    <form action="{{ url('/send-messenger/' . $userChat->id) }}" class="input-group" id="input-box"
                        method="POST" autocomplete="off">
                        @csrf
                        <input type="text" class="form-control" id="messenger-content" name="messenger"
                            placeholder="Text messenger...">
                        <button id="messenger-button" data-id="{{ $userChat->id }}" type="button"
                            class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa-solid fa-paper-plane"></i>
                            </span>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </header>
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

<script type="text/javascript">
    const btnMessenger = document.querySelector('.input-group-append');
    const friend_id = btnMessenger.getAttribute('data-id');

    btnMessenger.addEventListener('click', function(e) {
        const messenger = document.getElementById('messenger-content').value;
        var _token = $('input[name="_token"]').val();
        e.preventDefault();
        axios.post('/send-messenger/' + friend_id, {
            messenger: messenger,
            _token: _token
        }).then(function(response) {
            console.log(response.data);
            let html =
                '<div class="outgoing-chats d-flex flex-row"><div class="outgoing-chats-msg"><p>' +
                response.data
                .messenger +
                '</p><span class="time">Vừa xong</span></div><div class="outgoing-chats-img"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"alt=""></div></div>';
            document.getElementById('input-box').reset();
            document.getElementById('msg-box').insertAdjacentHTML("beforeend", html);
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

</html>
