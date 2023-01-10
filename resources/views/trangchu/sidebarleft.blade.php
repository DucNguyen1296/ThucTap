<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            <h4 class="widget-title">Thông tin cá nhân</h4>
            <ul class="short-profile">
                <li>
                    <span>Giới thiệu</span>
                    <p>{{ $user->title }} </p>
                </li>
                <li>
                    <span>Họ và tên</span>
                    <p>{{ $user->name }} </p>
                </li>
                <li>
                    <span>Ngày sinh nhật</span>
                    <p>{{ $user->date }}</p>
                </li>
                <li>
                    <span>Địa chỉ</span>
                    <p>{{ $user->location }}</p>
                </li>
            </ul>
        </div>
        <div class="widget stick-widget">
            <h4 class="widget-title">Lối đi tắt</h4>
            <ul class="naves">
                <li>

                    <a href="{{ asset('/user/' . Auth::user()->id) }}">
                        <div class="d-flex flex-row">
                            <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                alt="" width="30px" height="30px">
                            <div class="dropdown-user-info" style="font-weight:bold; margin-left:5px">
                                {{ Auth::user()->name }}</div>
                        </div>
                    </a>
                </li>
                <li>
                    <i class="ti-mouse-alt"></i>
                    <a href="{{ url('/chat/' . Auth::user()->id) }}" title="">Inbox</a>
                </li>
                <li>
                    <i class="ti-files"></i>
                    <a href="fav-page.html" title="">My pages</a>
                </li>
                <li>
                    <i class="ti-user"></i>
                    <a href="{{ route('user.friend.show', ['id' => $user->id]) }}" title="">Bạn bè</a>
                </li>
                <li>
                    <i class="ti-image"></i>
                    <a href="{{ route('user.friend.photo', ['id' => $user->id]) }}" title="">Ảnh</a>
                </li>
                <li>
                    <i class="ti-video-camera"></i>
                    <a href="{{ route('user.friend.video', ['id' => $user->id]) }}" title="">Videos</a>
                </li>
                <li>
                    <i class="ti-comments-smiley"></i>
                    <a href="messages.html" title="">Chat box</a>
                </li>
                <li>
                    <i class="ti-bell"></i>
                    <a href="notifications.html" title="">Notifications</a>
                </li>
                <li>
                    <i class="ti-share"></i>
                    <a href="people-nearby.html" title="">People Nearby</a>
                </li>
                <li>
                    <i class="fa fa-bar-chart-o"></i>
                    <a href="insights.html" title="">insights</a>
                </li>
                <li>
                    <i class="ti-power-off"></i>
                    <a href="/logout" title="">Logout</a>
                </li>
            </ul>
        </div><!-- Shortcuts -->

        {{-- <div class="widget ">
            <h4 class="widget-title">Who's follownig</h4>
            <ul class="followers">
                <li>
                    <figure><img src="images/resources/friend-avatar2.jpg" alt="">
                    </figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Kelly Bill</a>
                        </h4>
                        <a href="#" title="" class="underline">Add
                            Friend</a>
                    </div>
                </li>

            </ul>
        </div> --}}
        <!-- who's following -->
    </aside>
</div>
