<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="advertisment-box">
            <h4 class="">advertisment</h4>
            <figure>
                <a title="Advertisment" href="#"><img alt=""
                        src="{{ asset('images/resources/ad-widget.jpg') }}"></a>
            </figure>
        </div>
        <div class="widget">
            <div class="banner medium-opacity bluesh">
                <div class="bg-image" style="background-image: url('storage/images/resources/baner-widgetbg.jpg')">
                </div>
                <div class="baner-top">
                    <span><img alt="" src="{{ asset('images/book-icon.png') }}"></span>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <div class="banermeta">
                    <p>
                        create your own favourit page.
                    </p>
                    <span>like them all</span>
                    <a data-ripple="" title="" href="#">start now!</a>
                </div>
            </div>
        </div>
        <div class="widget friend-list stick-widget">
            <h4 class="widget-title">Bạn bè</h4>
            <div id="searchDir"></div>
            <ul id="people-list" class="friendz-list">
                @foreach ($userData->where('id', '!=', Auth::user()->id) as $key => $value)
                    <li>
                        <figure>
                            <img src="{{ asset('/storage/avatar/' . $value->avatars->avatar_name) }}" alt=""
                                width="50px" height="50px">
                            <span class="status f-online"></span>
                        </figure>
                        <div class="friendz-meta">
                            {{-- <a href="{{ url('/chat/' . $value->id) }}">{{ $value->name }}</a> --}}
                            <span>{{ $value->name }}</span>
                            <i>{{ $value->last_active->diffForHumans() }}</i>
                        </div>
                    </li>
                @endforeach
            </ul>
            @foreach ($userData->where('id', '!=', Auth::user()->id) as $key => $value)
                <div class="chat-box" id="box-{{ $value->id }}">
                    <div class="chat-head">
                        <span class="status f-online"></span>
                        <h6>{{ $value->name }}</h6>
                        <div class="more">
                            <span><i class="ti-more-alt"></i></span>
                            <span class="close-mesage"><i class="ti-close"></i></span>
                        </div>
                    </div>
                    <div class="chat-list">
                        <ul id="chat-list-right-{{ $value->id }}">
                            @foreach (Auth::user()->friendsMessenger->sortBy('created_at') as $msg)
                                @if ($msg->user_id == $value->id && $msg->friend_id == Auth::user()->id)
                                    <li class="me">
                                        <div class="chat-thumb"><img
                                                src="{{ asset('storage/avatar/' . $msg->user->avatars->avatar_name) }}"
                                                alt="">
                                        </div>
                                        <div class="notification-event">
                                            <span class="chat-message-item">
                                                {{ $msg->messenger }}
                                            </span>
                                            <span class="notification-date"><time datetime="2004-07-24T18:18"
                                                    class="entry-date updated">{{ $msg->created_at->diffForHumans() }}</time></span>
                                        </div>
                                    </li>
                                @elseif($msg->friend_id == $value->id && $msg->user_id == Auth::user()->id)
                                    <li class="you">
                                        <div class="chat-thumb"><img
                                                src="{{ asset('storage/avatar/' . $msg->user->avatars->avatar_name) }}"
                                                alt="">
                                        </div>
                                        <div class="notification-event">
                                            <span class="chat-message-item">
                                                {{ $msg->messenger }}
                                            </span>
                                            <span class="notification-date"><time datetime="2004-07-24T18:18"
                                                    class="entry-date updated">{{ $msg->created_at->diffForHumans() }}</time></span>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <form action="{{ url('/send-messenger/' . $value->id) }}" class="text-box" id="input-box-right"
                            method="POST" autocomplete="off">
                            @csrf
                            <textarea class="messenger-content-right" id="messenger-content-right" name="messenger" placeholder="Text messenger..."></textarea>
                            {{-- <div class="add-smiles">
                                <span title="add icon" class="em em-expressionless"></span>
                            </div>
                            <div class="smiles-bunch">
                                <i class="em em---1"></i>
                                <i class="em em-smiley"></i>
                                <i class="em em-anguished"></i>
                                <i class="em em-laughing"></i>
                                <i class="em em-angry"></i>
                                <i class="em em-astonished"></i>
                                <i class="em em-blush"></i>
                                <i class="em em-disappointed"></i>
                                <i class="em em-worried"></i>
                                <i class="em em-kissing_heart"></i>
                                <i class="em em-rage"></i>
                                <i class="em em-stuck_out_tongue"></i>
                            </div> --}}

                            {{-- <label for="messenger-button-right"><i class="fa fa-paper-plane"></i></label> --}}
                            <button class="messenger-button-right" id="messenger-button-right"
                                data-id="{{ $value->id }}" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div><!-- friends list sidebar -->
    </aside>
</div>
