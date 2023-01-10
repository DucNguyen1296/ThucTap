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
                                    <div class="frnds">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My
                                                    Friends</a>
                                                <span>{{ $friendsFrom->where('approved', 1)->where('user_id', '!=', $user->id)->count() }}</span>
                                            </li>
                                            <li class="nav-item"><a class="" href="#frends-req"
                                                    data-toggle="tab">Friend
                                                    Requests</a><span>{{ $friendsFrom->where('approved', 0)->count() }}</span>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active fade show " id="frends">
                                                <ul class="nearby-contct">
                                                    @foreach ($friendsFrom->where('approved', 1)->where('user_id', '!=', $user->id) as $us)
                                                        <li>
                                                            <div class="nearly-pepls">
                                                                <figure>
                                                                    <a href="{{ url('user/' . $us->users->id) }}"
                                                                        title=""><img
                                                                            src="{{ asset('storage/avatar/' . $us->users->avatars->avatar_name) }}"
                                                                            alt=""></a>
                                                                </figure>
                                                                <div class="pepl-info">
                                                                    <h4><a href="{{ url('user/' . $us->users->id) }}"
                                                                            title="">{{ $us->users->name }}</a>
                                                                    </h4>
                                                                    <span>{{ $us->users->role }}</span>
                                                                    <form
                                                                        action="{{ route('user.friend.delete', ['id' => $us->users->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-primary"
                                                                            type="submit">Xóa bạn
                                                                            bè</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="lodmore"><button class="btn-view btn-load-more"></button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="frends-req">
                                                <ul class="nearby-contct">
                                                    @foreach ($friendsFrom->where('approved', 0) as $us)
                                                        <li>
                                                            <div class="nearly-pepls">
                                                                <figure>
                                                                    <a href="time-line.html" title=""><img
                                                                            src="{{ asset('storage/avatar/' . $us->users->avatars->avatar_name) }}"
                                                                            alt=""></a>
                                                                </figure>
                                                                <div class="pepl-info">
                                                                    <h4><a href="time-line.html"
                                                                            title="">{{ $us->users->name }}</a>
                                                                    </h4>
                                                                    <span>{{ $us->users->role }}</span>
                                                                    <form
                                                                        action="{{ route('user.friend.accept', ['id' => $us->users->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-primary btn-sm"
                                                                            type="submit">
                                                                            Xác nhận
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('user.friend.decline', ['id' => $us->users->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-secondary btn-sm"
                                                                            type="submit">
                                                                            Từ chối
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button class="btn-view btn-load-more"></button>
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
@endsection
