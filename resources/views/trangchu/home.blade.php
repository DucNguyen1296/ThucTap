@extends('trangchu/layout')
@section('content')
    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            @include('trangchu/sidebarleft')
                            <!-- sidebar left -->
                            <div class="col-lg-6">
                                <div class="central-meta">
                                    <div class="new-postbox">
                                        <figure>
                                            <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"
                                                alt="">
                                        </figure>
                                        <div class="newpst-input">
                                            <button type="button" class="btn btn-light" data-toggle="modal"
                                                data-target="#exampleModal"
                                                style="
                                                width: 480px;
                                                height: 50px;
                                                border: solid 0.1px #777;
                                                text-align: left;
                                                border-radius: 30px;">
                                                {{ Auth::user()->name }} ơi, bạn đang nghĩ gì thế?
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- add post new box -->

                                <div class="loadMore">
                                    @foreach ($postDatas as $post)
                                        @foreach ($friends as $friend)
                                            @if (($post->user_id == $friend->friend_id && $friend->approved == 1 && $post->user->status == 1) ||
                                                ($post->user_id == Auth::user()->id && $post->user->status == 1))
                                                <div class="central-meta item">
                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                <img src="{{ asset('/storage/avatar/' . $post->user->avatars->avatar_name) }}"
                                                                    alt="avatar">
                                                            </figure>
                                                            <div class="friend-name">
                                                                <div class="d-flex flex-row">
                                                                    <ins><a href="{{ url('user/' . $post->user->id) }}"
                                                                            title="">{{ $post->user->name }}</a></ins>
                                                                    @if ($post->user_id == Auth::user()->id)
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-light dropdown-toggle"
                                                                                type="button" id="dropdownMenu1"
                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">

                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenu1">
                                                                                <button class="dropdown-item" type="button"
                                                                                    data-toggle="modal"
                                                                                    data-target="#exampleModal{{ $post->id }}">Chỉnh
                                                                                    sửa
                                                                                    bài
                                                                                    viết</button>
                                                                                <form
                                                                                    action="{{ route('user.post.delete', ['id' => $post->id]) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button class="dropdown-item"
                                                                                        type="submit">Xóa
                                                                                        bài viết</button>
                                                                                </form>
                                                                            </div>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade"
                                                                                id="exampleModal{{ $post->id }}"
                                                                                tabindex="-1" role="dialog"
                                                                                aria-labelledby="exampleModalLabel{{ $post->id }}"
                                                                                aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="exampleModalLabel{{ $post->id }}">
                                                                                                <div
                                                                                                    class="dropdown-user-info">
                                                                                                    {{ Auth::user()->name }}
                                                                                                </div>
                                                                                            </h5>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form
                                                                                                action="{{ route('user.post.update', ['id' => $post->id]) }}"
                                                                                                method="POST"
                                                                                                enctype="multipart/form-data"
                                                                                                id="">
                                                                                                @csrf
                                                                                                <label
                                                                                                    for="post__title">Tiêu
                                                                                                    đề
                                                                                                    bài viết</label>
                                                                                                <div class="mb-3">
                                                                                                    <input type="text"
                                                                                                        name="title"
                                                                                                        class="form-control"
                                                                                                        placeholder=" Tiêu đề"
                                                                                                        id=""
                                                                                                        value="{{ $post->title }}">
                                                                                                </div>

                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="post__text">Nội
                                                                                                        dung bài
                                                                                                        viết</label>
                                                                                                        <textarea name="post" class="form-control" id="" rows="3" style="resize:none">{{ $post->post }}
                                                                                                        </textarea>
                                                                                                </div>
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="post__link">Link
                                                                                                        đính kèm bài
                                                                                                        viết</label>
                                                                                                    <input type="url"
                                                                                                        name="link"
                                                                                                        class="form-control"
                                                                                                        id=""
                                                                                                        placeholder=" Thêm link bài viết">
                                                                                                </div>
                                                                                                <div>
                                                                                                    <img id="image_preview3"
                                                                                                        height="100%"
                                                                                                        width="100%" />
                                                                                                </div>

                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="formFileUpdate"
                                                                                                        class="form-label">Thêm
                                                                                                        ảnh vào bài
                                                                                                        viết</label>
                                                                                                    <input
                                                                                                        class="form-control form-control-sm"
                                                                                                        id="formFileUpdate"
                                                                                                        type="file"
                                                                                                        name="image"
                                                                                                        onchange="updatePostImage(event)" />
                                                                                                </div>
                                                                                                <button
                                                                                                    class="btn btn-primary"
                                                                                                    type="submit"
                                                                                                    id="">Cập
                                                                                                    nhập</button>
                                                                                            </form>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <span>published:
                                                                    {{ $post->created_at->diffForHumans() }}

                                                                </span>

                                                            </div>
                                                            <div class="post-meta">
                                                                @if ($post->link != null || $post->link_image != null)
                                                                    <a href="{{ $post->link }}">{{ $post->link }}
                                                                        <img src="{{ $post->link_image }}"
                                                                            alt="">
                                                                    </a>
                                                                @endif

                                                                @if ($post->image_name != null)
                                                                    <div>
                                                                        <img src="{{ asset('/storage/post_image/' . $post->image_name) }}"
                                                                            alt="Image">
                                                                    </div>
                                                                @endif
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="views" data-toggle="tooltip"
                                                                                title="views">
                                                                                <i class="fa fa-eye"></i>
                                                                                <ins>1.2k</ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="comment" data-toggle="tooltip"
                                                                                title="Comments">
                                                                                <i class="fa fa-comments-o"></i>
                                                                                <ins>52</ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="like" data-toggle="tooltip"
                                                                                title="like">
                                                                                <i class="ti-heart"></i>
                                                                                <ins>2.2k</ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="dislike" data-toggle="tooltip"
                                                                                title="dislike">
                                                                                <i class="ti-heart-broken"></i>
                                                                                <ins>200</ins>
                                                                            </span>
                                                                        </li>
                                                                        <li class="social-media">
                                                                            <div class="menu">
                                                                                <div class="btn trigger"><i
                                                                                        class="fa fa-share-alt"></i>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-html5"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-facebook"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-google-plus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-twitter"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-css3"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-instagram"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-dribbble"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="rotater">
                                                                                    <div class="btn btn-icon"><a
                                                                                            href="#"
                                                                                            title=""><i
                                                                                                class="fa fa-pinterest"></i></a>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="description">

                                                                    <h5 class="card-title">{{ $post->title }}</h5>
                                                                    <p class="card-text">{{ $post->post }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="coment-area">
                                                            <ul class="we-comet" id="comment{{ $post->id }}">
                                                                @foreach ($users as $us)
                                                                    @foreach ($post->comments->sortByDesc('created_at') as $comment)
                                                                        @if ($us->id == $comment->user_id)
                                                                            <li class="cmt_id{{ $comment->id }}">
                                                                                <div class="comet-avatar">
                                                                                    <img src="{{ asset('/storage/avatar/' . $comment->user->avatars->avatar_name) }}"
                                                                                        alt="avatar">
                                                                                </div>
                                                                                <div class="we-comment">
                                                                                    <div class="coment-head">
                                                                                        <h5><a href="{{ url('user/' . $comment->user->id) }}"
                                                                                                title="">{{ $comment->user->name }}</a>
                                                                                        </h5>
                                                                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                                                        <div class="we-reply"
                                                                                            title="Reply">
                                                                                            <i
                                                                                                class="fa fa-reply reply-button-fa"></i>
                                                                                        </div>
                                                                                        @if ($comment->user_id == Auth::user()->id || $comment->post->user_id == Auth::user()->id)
                                                                                            <div
                                                                                                class="dropdown drop-comment">
                                                                                                <button
                                                                                                    class="btn btn-light dropdown-toggle"
                                                                                                    type="button"
                                                                                                    id="dropdownMenu2"
                                                                                                    data-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false">

                                                                                                </button>
                                                                                                <div class="dropdown-menu"
                                                                                                    aria-labelledby="dropdownMenu2">
                                                                                                    @if ($comment->user_id == Auth::user()->id)
                                                                                                        <button
                                                                                                            class="dropdown-item"
                                                                                                            type="button"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#exampleModal{{ $comment->id }}">Chỉnh
                                                                                                            sửa bình
                                                                                                            luận</button>
                                                                                                    @endif
                                                                                                    <form
                                                                                                        action="{{ route('user.comment.delete', ['id' => $comment->id]) }}"
                                                                                                        method="POST"
                                                                                                        id="comment__delete">
                                                                                                        @csrf
                                                                                                        @method('DELETE')
                                                                                                        <button
                                                                                                            class="dropdown-item"
                                                                                                            type="submit"
                                                                                                            id="comment__button--delete"
                                                                                                            data-id="{{ $comment->id }}">Xóa
                                                                                                            bình
                                                                                                            luận</button>
                                                                                                    </form>
                                                                                                </div>
                                                                                                <!-- Modal to Update Comment -->
                                                                                                <div class="modal fade"
                                                                                                    id="exampleModal{{ $comment->id }}"
                                                                                                    tabindex="-1"
                                                                                                    role="dialog"
                                                                                                    aria-labelledby="exampleModalLabel{{ $comment->id }}"
                                                                                                    aria-hidden="true">
                                                                                                    <div class="modal-dialog"
                                                                                                        role="document">
                                                                                                        <div
                                                                                                            class="modal-content">
                                                                                                            <div
                                                                                                                class="modal-header">
                                                                                                                <h5 class="modal-title"
                                                                                                                    id="exampleModalLabel{{ $comment->id }}">
                                                                                                                    <div
                                                                                                                        class="dropdown-user-info">
                                                                                                                        {{ Auth::user()->name }}
                                                                                                                    </div>
                                                                                                                </h5>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="close"
                                                                                                                    data-dismiss="modal"
                                                                                                                    aria-label="Close">
                                                                                                                    <span
                                                                                                                        aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-body">
                                                                                                                <form
                                                                                                                    action="{{ route('user.comment.update', ['id' => $comment->id]) }}"
                                                                                                                    method="POST"
                                                                                                                    id="comment__update{{ $comment->id }}">
                                                                                                                    @method('PUT')
                                                                                                                    @csrf
                                                                                                                    <div
                                                                                                                        class="mb-3">
                                                                                                                        <label
                                                                                                                            for="post__text">Nội
                                                                                                                            dung
                                                                                                                            bình
                                                                                                                            luận</label>
                                                                                                                            <textarea name="update_comment" class="form-control" rows="3" style="resize:none" data-id="{{ $comment->id }}"
                                                                                                                                id="comment__content--update{{ $comment->id }}">{{ $comment->comment }}
                                                                                                                            </textarea>
                                                                                                                    </div>
                                                                                                                    <button
                                                                                                                        class="btn btn-primary modal__button--update"
                                                                                                                        type="submit"
                                                                                                                        data-id="{{ $comment->id }}"
                                                                                                                        id="comment__button--update">Cập
                                                                                                                        nhập</button>
                                                                                                                </form>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    <p
                                                                                        id="comment--info{{ $comment->id }}">
                                                                                        {{ $comment->comment }}</p>
                                                                                    <div
                                                                                        class="reply-comment d-flex flex-row hidden">
                                                                                        <div class="comet-avatar">
                                                                                            <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <div
                                                                                            class="post-comt-box comt-reply">
                                                                                            <form
                                                                                                action="{{ route('user.reply.create', ['id' => $comment->id]) }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                <textarea placeholder="Viết phản hồi" name="reply" id=""></textarea>
                                                                                                <div class="add-smiles">
                                                                                                    <span
                                                                                                        class="em em-expressionless"
                                                                                                        title="add icon"></span>
                                                                                                </div>
                                                                                                <div class="smiles-bunch">
                                                                                                    <i
                                                                                                        class="em em---1"></i>
                                                                                                    <i
                                                                                                        class="em em-smiley"></i>
                                                                                                    <i
                                                                                                        class="em em-anguished"></i>
                                                                                                    <i
                                                                                                        class="em em-laughing"></i>
                                                                                                    <i
                                                                                                        class="em em-angry"></i>
                                                                                                    <i
                                                                                                        class="em em-astonished"></i>
                                                                                                    <i
                                                                                                        class="em em-blush"></i>
                                                                                                    <i
                                                                                                        class="em em-disappointed"></i>
                                                                                                    <i
                                                                                                        class="em em-worried"></i>
                                                                                                    <i
                                                                                                        class="em em-kissing_heart"></i>
                                                                                                    <i
                                                                                                        class="em em-rage"></i>
                                                                                                    <i
                                                                                                        class="em em-stuck_out_tongue"></i>
                                                                                                </div>
                                                                                                <button
                                                                                                    class="reply-button"
                                                                                                    type="submit"
                                                                                                    id="comment__reply--button"
                                                                                                    data-id=""></button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <ul>
                                                                                    @foreach ($comment->replies as $reply)
                                                                                        <li
                                                                                            class="reply_id{{ $reply->id }}">
                                                                                            <div class="comet-avatar">
                                                                                                <img src="{{ asset('/storage/avatar/' . $reply->user->avatars->avatar_name) }}"
                                                                                                    alt="avatar">
                                                                                            </div>
                                                                                            <div
                                                                                                class="we-comment reply_id{{ $reply->id }}">
                                                                                                <div class="coment-head">
                                                                                                    <h5><a href="{{ url('user/' . $reply->user->id) }}"
                                                                                                            title="">{{ $reply->user->name }}</a>
                                                                                                    </h5>
                                                                                                    <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                                                                    {{-- <div class="we-reply"
                                                                                                        href="#"
                                                                                                        title="Reply"><i
                                                                                                            class="fa fa-reply reply-reply-button"></i></div> --}}
                                                                                                    @if ($reply->comment->user_id == Auth::user()->id || $reply->post->user_id == Auth::user()->id)
                                                                                                        <div
                                                                                                            class="dropdown drop-reply">
                                                                                                            <button
                                                                                                                class="btn btn-light dropdown-toggle"
                                                                                                                type="button"
                                                                                                                id="dropdownMenu3"
                                                                                                                data-toggle="dropdown"
                                                                                                                aria-haspopup="true"
                                                                                                                aria-expanded="false">

                                                                                                            </button>
                                                                                                            <div class="dropdown-menu"
                                                                                                                aria-labelledby="dropdownMenu3">
                                                                                                                @if ($reply->user_id == Auth::user()->id)
                                                                                                                    <button
                                                                                                                        class="dropdown-item"
                                                                                                                        type="button">Chỉnh
                                                                                                                        sửa
                                                                                                                        phản
                                                                                                                        hồi</button>
                                                                                                                @endif
                                                                                                                <form
                                                                                                                    action="{{ route('user.reply.delete', ['id' => $reply->id]) }}"
                                                                                                                    method="POST">
                                                                                                                    @csrf
                                                                                                                    @method('DELETE')
                                                                                                                    <button
                                                                                                                        class="dropdown-item"
                                                                                                                        id="reply__button--delete"
                                                                                                                        type="submit"
                                                                                                                        data-id="{{ $reply->id }}">Xóa
                                                                                                                        phản
                                                                                                                        hồi</button>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                                <p>{{ $reply->reply }}</p>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                                <li>
                                                                    <a href="#" title=""
                                                                        class="showmore underline">more
                                                                        comments</a>
                                                                </li>
                                                                <li class="post-comment">
                                                                    <div class="comet-avatar">
                                                                        <img src="{{ asset('/storage/avatar/' . $user->avatars->avatar_name) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="post-comt-box post-comt">
                                                                        <form
                                                                            action="{{ route('user.post.comment', ['id' => $post->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <textarea placeholder="Viết bình luận" name="comment" id="post__comment{{ $post->id }}"></textarea>
                                                                            <div class="add-smiles">
                                                                                <span class="em em-expressionless"
                                                                                    title="add icon"></span>
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
                                                                            </div>
                                                                            <button class="comment-button" type="submit"
                                                                                id="post__comment--button"
                                                                                data-id="{{ $post->id }}"></button>
                                                                        </form>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div><!-- centerl meta -->
                        @include('trangchu/sidebarright')
                        <!-- sidebar right -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
