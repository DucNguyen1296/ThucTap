@extends('trangchu/layout')
@section('content')
    @include('trangchu/topbar')
    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            @include('trangchu/editsidebarleft')
                            <!-- sidebar -->
                            <div class="col-lg-6">
                                <div class="central-meta">
                                    <div class="messages">
                                        <h5 class="f-title"><i class="ti-bell"></i>Tin nhắn <span class="more-options"><i
                                                    class="fa fa-ellipsis-h"></i></span></h5>
                                        <div class="message-box">

                                            <div class="peoples-mesg-box">
                                                <div class="conversation-head">
                                                    <figure><img
                                                            src="{{ asset('storage/avatar/' . $userChat->avatars->avatar_name) }}"
                                                            alt="avatar">
                                                    </figure>
                                                    <span>{{ $userChat->name }} <i>online</i></span>
                                                </div>
                                                <div class="chat-page">
                                                    <div class="msg-inbox">
                                                        <div class="chats">
                                                            <div class="msg-page" id="msg-box">
                                                                @foreach ($messengers as $messenger)
                                                                    @if ($messenger->friend_id == Auth::user()->id)
                                                                        <div class="received-chats d-flex flex-row">
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
                                                                        <div class="outgoing-chats d-flex flex-row">
                                                                            <div class="outgoing-chats-msg">
                                                                                <p>{{ $messenger->messenger }}</p>
                                                                                <span
                                                                                    class="time">{{ $messenger->created_at->diffForHumans() }}</span>
                                                                            </div>
                                                                            <div class="outgoing-chats-img">
                                                                                <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
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
                                                            <i class="fa fa-plus-circle"></i>
                                                            <i class="fa fa-camera"></i>
                                                            <i class="fa fa-smile-o"></i>
                                                        </div>

                                                        <form action="{{ url('/send-messenger/' . $userChat->id) }}"
                                                            class="input-group" id="input-box" method="POST"
                                                            autocomplete="off">
                                                            @csrf
                                                            <input type="text" class="form-control-msg"
                                                                id="messenger-content" name="messenger"
                                                                placeholder="Text messenger...">
                                                            <button id="messenger-button" data-id="{{ $userChat->id }}"
                                                                type="submit" class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-paper-plane"></i>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- <ul class="chatting-area">
                                                    <li class="you">
                                                        <figure><img src="images/resources/userlist-2.jpg" alt="">
                                                        </figure>
                                                        <p>what's liz short for? :)</p>
                                                    </li>
                                                    <li class="me">
                                                        <figure><img src="images/resources/userlist-1.jpg" alt="">
                                                        </figure>
                                                        <p>Elizabeth lol</p>
                                                    </li>
                                                    <li class="me">
                                                        <figure><img src="images/resources/userlist-1.jpg" alt="">
                                                        </figure>
                                                        <p>wanna know whats my second guess was?</p>
                                                    </li>
                                                    <li class="you">
                                                        <figure><img src="images/resources/userlist-2.jpg" alt="">
                                                        </figure>
                                                        <p>yes</p>
                                                    </li>
                                                    <li class="me">
                                                        <figure><img src="images/resources/userlist-1.jpg" alt="">
                                                        </figure>
                                                        <p>Disney's the lizard king</p>
                                                    </li>
                                                    <li class="me">
                                                        <figure><img src="images/resources/userlist-1.jpg" alt="">
                                                        </figure>
                                                        <p>i know him 5 years ago</p>
                                                    </li>
                                                    <li class="you">
                                                        <figure><img src="images/resources/userlist-2.jpg" alt="">
                                                        </figure>
                                                        <p>coooooooooool dude ;)</p>
                                                    </li>
                                                </ul>
                                                <div class="message-text-container">
                                                    <form method="post">
                                                        <textarea></textarea>
                                                        <button title="send"><i class="fa fa-paper-plane"></i></button>
                                                    </form>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- centerl meta -->
                            @include('trangchu/sidebarright')
                            <!-- sidebar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        const btnMessenger = document.querySelector('.input-group-append');

        const friend_id = btnMessenger.getAttribute('data-id');

        btnMessenger.addEventListener('click', function(e) {
            const messenger = document.getElementById('messenger-content').value;
            var _token = $('input[name="_token"]').val();
            e.preventDefault();
            axios.post('/send-messenger/' + friend_id, {
                messenger: messenger,
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
@endsection
