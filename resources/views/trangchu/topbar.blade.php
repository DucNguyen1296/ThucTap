<section>
    <div class="feature-photo">
        <figure><img src="{{ asset('images/resources/timeline-1.jpg') }}" alt=""></figure>
        @if (Auth::user()->id != $user->id)
            @if ($friend != null)
                @if ($friend->approved == 0)
                    @if ($friend->user_id == $user->id)
                        <div class="add-btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <a href="#" title="" data-ripple="">Đợi xét duyệt bạn bè</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="{{ route('user.friend.accept', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">Chấp nhận
                                    lời mời</button>
                            </form>
                            <form action="{{ route('user.friend.cancel', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Hủy lời mời
                                    kết bạn</button>
                            </form>
                        </div>
                    @else
                        <div class="add-btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <a href="#" title="" data-ripple="">Đã gửi lời mời kết bạn</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="{{ route('user.friend.cancel', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Hủy lời mời kết bạn</button>
                            </form>
                        </div>
                    @endif
                @else
                    <div class="add-btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <a href="#" title="" data-ripple="">Đã là bạn bè</a>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="{{ route('user.friend.delete', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" type="submit">Xóa bạn bè</button>
                        </form>
                    </div>
                @endif
            @else
                <div class="add-btn">
                    <form action="{{ route('user.friend.store', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-primary" type="submit">Thêm bạn bè</button>
                    </form>
                </div>
            @endif
        @endif
        <form class="edit-phto">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Thay đổi ảnh nền
                <input type="file" />
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}" alt="">
                            <div class="edit-phto" data-toggle="modal" data-target="#exampleModal2">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Thay đổi ảnh đại diện
                                </label>
                            </div>
                        </figure>
                    </div>

                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{ $user->name }}</h5>
                                <span>{{ $user->role }}</span>
                            </li>
                            <li>
                                <a class="active" href="{{ asset('/user/' . $user->id) }}" title=""
                                    data-ripple="">Bài viết</a>
                                <a class="" href="timeline-photos.html" title="" data-ripple="">Ảnh</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                <a class="" href="{{ route('user.friend.show', ['id' => $user->id]) }}"
                                    title="" data-ripple="">Bạn bè</a>
                                <a class="" href="timeline-groups.html" title="" data-ripple="">Nhóm</a>
                                <a class="" href="{{ route('user.profile.about', ['id' => $user->id]) }}"
                                    title="" data-ripple="">Thông tin</a>
                                <a class="" href="#" title="" data-ripple="">more</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
