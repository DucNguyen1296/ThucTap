<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fakebook</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('/storage/logo/facebook.png') }}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/mainstyle.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/newsfeedstyle.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/messengerstyle.css') }}">
    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">

        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a href="newsfeed.html" title=""><img src="{{ asset('images/logo2.png') }}"
                            alt=""></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input type="text" placeholder="Tìm kiếm" />
                    <a href="#" class="fa fa-search"></a>

                </form>
            </div>
            <nav id="menu" class="res-menu">
                <ul>
                    <li><span>Home</span>
                        <ul>
                            <li><a href="index-2.html" title="">Home Social</a></li>
                            <li><a href="index2.html" title="">Home Social 2</a></li>
                            <li><a href="index-company.html" title="">Home Company</a></li>
                            <li><a href="landing.html" title="">Login page</a></li>
                            <li><a href="/logout" title="">Logout Page</a></li>
                            <li><a href="newsfeed.html" title="">news feed</a></li>
                        </ul>
                    </li>
                    <li><span>Time Line</span>
                        <ul>
                            <li><a href="time-line.html" title="">timeline</a></li>
                            <li><a href="timeline-friends.html" title="">timeline friends</a></li>
                            <li><a href="timeline-groups.html" title="">timeline groups</a></li>
                            <li><a href="timeline-pages.html" title="">timeline pages</a></li>
                            <li><a href="timeline-photos.html" title="">timeline photos</a></li>
                            <li><a href="timeline-videos.html" title="">timeline videos</a></li>
                            <li><a href="fav-page.html" title="">favourit page</a></li>
                            <li><a href="groups.html" title="">groups page</a></li>
                            <li><a href="page-likers.html" title="">Likes page</a></li>
                            <li><a href="people-nearby.html" title="">people nearby</a></li>


                        </ul>
                    </li>
                    <li><span>Account Setting</span>
                        <ul>
                            <li><a href="create-fav-page.html" title="">create fav page</a></li>
                            <li><a href="edit-account-setting.html" title="">edit account setting</a></li>
                            <li><a href="edit-interest.html" title="">edit-interest</a></li>
                            <li><a href="edit-password.html" title="">edit-password</a></li>
                            <li><a href="edit-profile-basic.html" title="">edit profile basics</a></li>
                            <li><a href="edit-work-eductation.html" title="">edit work educations</a></li>
                            <li><a href="messages.html" title="">message box</a></li>
                            <li><a href="inbox.html" title="">Inbox</a></li>
                            <li><a href="notifications.html" title="">notifications page</a></li>
                        </ul>
                    </li>
                    <li><span>forum</span>
                        <ul>
                            <li><a href="forum.html" title="">Forum Page</a></li>
                            <li><a href="forums-category.html" title="">Fourm Category</a></li>
                            <li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
                            <li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
                        </ul>
                    </li>
                    <li><span>Our Shop</span>
                        <ul>
                            <li><a href="shop.html" title="">Shop Products</a></li>
                            <li><a href="shop-masonry.html" title="">Shop Masonry Products</a></li>
                            <li><a href="shop-single.html" title="">Shop Detail Page</a></li>
                            <li><a href="shop-cart.html" title="">Shop Product Cart</a></li>
                            <li><a href="shop-checkout.html" title="">Product Checkout</a></li>
                        </ul>
                    </li>
                    <li><span>Our Blog</span>
                        <ul>
                            <li><a href="blog-grid-wo-sidebar.html" title="">Our Blog</a></li>
                            <li><a href="blog-grid-right-sidebar.html" title="">Blog with R-Sidebar</a></li>
                            <li><a href="blog-grid-left-sidebar.html" title="">Blog with L-Sidebar</a></li>
                            <li><a href="blog-masonry.html" title="">Blog Masonry Style</a></li>
                            <li><a href="blog-list-wo-sidebar.html" title="">Blog List Style</a></li>
                            <li><a href="blog-list-right-sidebar.html" title="">Blog List with R-Sidebar</a>
                            </li>
                            <li><a href="blog-list-left-sidebar.html" title="">Blog List with L-Sidebar</a></li>
                            <li><a href="blog-detail.html" title="">Blog Post Detail</a></li>
                        </ul>
                    </li>
                    <li><span>Portfolio</span>
                        <ul>
                            <li><a href="portfolio-2colm.html" title="">Portfolio 2col</a></li>
                            <li><a href="portfolio-3colm.html" title="">Portfolio 3col</a></li>
                            <li><a href="portfolio-4colm.html" title="">Portfolio 4col</a></li>
                        </ul>
                    </li>
                    <li><span>Support & Help</span>
                        <ul>
                            <li><a href="support-and-help.html" title="">Support & Help</a></li>
                            <li><a href="support-and-help-detail.html" title="">Support & Help Detail</a></li>
                            <li><a href="support-and-help-search-result.html" title="">Support & Help Search
                                    Result</a></li>
                        </ul>
                    </li>
                    <li><span>More pages</span>
                        <ul>
                            <li><a href="careers.html" title="">Careers</a></li>
                            <li><a href="career-detail.html" title="">Career Detail</a></li>
                            <li><a href="404.html" title="">404 error page</a></li>
                            <li><a href="404-2.html" title="">404 Style2</a></li>
                            <li><a href="faq.html" title="">faq's page</a></li>
                            <li><a href="insights.html" title="">insights</a></li>
                            <li><a href="knowledge-base.html" title="">knowledge base</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html" title="">about</a></li>
                    <li><a href="about-company.html" title="">About Us2</a></li>
                    <li><a href="contact.html" title="">contact</a></li>
                    <li><a href="contact-branches.html" title="">Contact Us2</a></li>
                    <li><a href="widgets.html" title="">Widgts</a></li>
                </ul>
            </nav>
            <nav id="shoppingbag">
                <div>
                    <div class="">
                        <form method="post">
                            <div class="setting-row">
                                <span>use night mode</span>
                                <input type="checkbox" id="nightmode" />
                                <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notifications</span>
                                <input type="checkbox" id="switch2" />
                                <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notification sound</span>
                                <input type="checkbox" id="switch3" />
                                <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>My profile</span>
                                <input type="checkbox" id="switch4" />
                                <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show profile</span>
                                <input type="checkbox" id="switch5" />
                                <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                        <h4 class="panel-title">Account Setting</h4>
                        <form method="post">
                            <div class="setting-row">
                                <span>Sub users</span>
                                <input type="checkbox" id="switch6" />
                                <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>personal account</span>
                                <input type="checkbox" id="switch7" />
                                <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Business account</span>
                                <input type="checkbox" id="switch8" />
                                <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show me online</span>
                                <input type="checkbox" id="switch9" />
                                <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Delete history</span>
                                <input type="checkbox" id="switch10" />
                                <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Expose author name</span>
                                <input type="checkbox" id="switch11" />
                                <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div><!-- responsive header -->

        <div class="topbar stick">
            <div class="logo">
                <a title="" href="/"><img src="{{ asset('/storage/logo/fakebook.png') }}" alt="logo"
                        width="100px" height="50px"></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <a href="#" title="">Trang</a>
                        <ul>
                            <li><a href="/" title="">Trang mạng xã hội</a></li>
                            <li><a href="index2.html" title="">Trang mua bán</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">Bài viết</a>
                        <ul>
                            <li><a href="{{ asset('/user/' . Auth::user()->id) }}" title="">Cá nhân</a>
                            </li>
                            <li><a href="{{ route('user.friend.show', ['id' => $user->id]) }}" title="">Bạn
                                    bè</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">Cài đặt tài khoản</a>
                        <ul>
                            <li><a href="{{ route('user.edit.profile') }}" title="">Thay đổi thông tin</a>
                            </li>
                            <li><a href="{{ route('user.change.password') }}" title="">Thay đổi mật khẩu</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">Xem thêm</a>
                        <ul>
                            <li><a href="404.html" title="">404 error page</a></li>
                            <li><a href="{{ route('user.profile.about', ['id' => $user->id]) }}" title="">Thông
                                    tin</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="setting-area">
                    <li>
                        <span href="#" title="Home" data-ripple=""><i class="ti-search"></i></span>
                        <div class="searched">
                            <form method="post" class="form-search">
                                <input type="text" placeholder="Tìm kiếm" name="search" id="search">
                                <button data-ripple><i class="ti-search"></i></button>
                                <div class="form__group">
                                    <ul class="search__result">

                                    </ul>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li><a href="/" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
                    <li>
                        <span href="#" title="Notification" data-ripple="">
                            <i class="ti-bell"></i><span
                                style="font-size: 80%">{{ Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->count() }}</span>
                        </span>
                        <div class="dropdowns">
                            <span>Lời mời kết bạn</span>
                            <ul class="drops-menu">
                                @if (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id)->isNotEmpty())
                                    @foreach (Auth::user()->friendsFrom->where('approved', '=', 0)->where('friend_id', Auth::user()->id) as $friendFrom)
                                        <li>
                                            <div class="d-flex flex-row">
                                                <img src="{{ asset('/storage/avatar/' . $friendFrom->users->avatars->avatar_name) }}"
                                                    alt="Profile Picture" width="50" height="50">
                                                <div class="mesg-meta">
                                                    <h6><a href="{{ url('user/' . $friendFrom->users->id) }}"
                                                            title="">{{ $friendFrom->users->name }}</a></h6>
                                                    <div data-userid="{{ $friendFrom->users->id }}">
                                                        <div class="d-flex flex-row friend-button ">
                                                            <form
                                                                action="{{ route('user.friend.accept', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-primary btn-sm request"
                                                                    type="submit">
                                                                    Xác nhận
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('user.friend.decline', ['id' => $friendFrom->users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-secondary btn-sm request"
                                                                    type="submit">
                                                                    Từ chối
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <div>
                                            You don't have any friend request
                                        </div>
                                    </li>
                                @endif
                            </ul>
                            <a href="notifications.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li>
                        <span href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span
                                style="font-size: 80%">{{ $userData->where('id', '!=', Auth::user()->id)->count() }}</span></span>
                        <div class="dropdowns">
                            <span>Chat cùng bạn bè</span>
                            <ul class="drops-menu">
                                @foreach ($userData->where('id', '!=', Auth::user()->id) as $key => $value)
                                    <li>
                                        <a href="{{ url('/chat/' . $value->id) }}" title="">
                                            <img src="{{ asset('/storage/avatar/' . $value->avatars->avatar_name) }}"
                                                alt="">
                                            <div class="mesg-meta">
                                                <h6>{{ $value->name }}</h6>
                                                @if ($message->where('friend_id', $value->id)->sortByDesc('created_at')->isNotEmpty())
                                                    <span>{{ $message->where('friend_id', $value->id)->sortByDesc('created_at')->first()->messenger }}</span>
                                                    <i>{{ $message->where('friend_id', $value->id)->sortByDesc('created_at')->first()->created_at->diffForHumans() }}</i>
                                                @else
                                                    <span>Cùng trò chuyện nào</span>
                                                @endif
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="messages.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                </ul>
                <div class="user-img">
                    <img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" width="50px"
                        height="50px" alt="">
                    <span class="status f-online"></span>
                    <div class="user-setting">
                        <a href="#" title=""><span class="status f-online"></span>online</a>
                        <a href="#" title=""><span class="status f-away"></span>away</a>
                        <a href="#" title=""><span class="status f-off"></span>offline</a>
                        <a href="{{ url('/user/' . Auth::user()->id) }}"><i class="ti-user"></i> view
                            profile</a>
                        <a href="{{ url('/editprofile') }}"><i class="ti-pencil-alt"></i>edit
                            profile</a>
                        <a href="#" title=""><i class="ti-target"></i>activity log</a>
                        <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                        <a href="/logout"><i class="ti-power-off"></i>log out</a>
                    </div>
                </div>
                <span class="ti-menu main-menu" data-ripple=""></span>
            </div>
        </div><!-- topbar -->

        <!-- section main -->
        @yield('content')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="widget">
                            <div class="foot-logo">
                                <div class="logo">
                                    <a href="{{ url('/') }}" title=""><img
                                            src="{{ asset('/storage/logo/fakebook.png') }}" alt="logo"
                                            width="100px" height="50px"></a>
                                </div>
                                <p>
                                    The trio took this simple idea and built it into the world’s leading carpooling
                                    platform.
                                </p>
                            </div>
                            <ul class="location">
                                <li>
                                    <i class="ti-map-alt"></i>
                                    <p>33 new montgomery st.750 san francisco, CA USA 94105.</p>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+1-56-346 345</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>follow</h4>
                            </div>
                            <ul class="list-style">
                                <li><i class="fa fa-facebook-square"></i> <a
                                        href="https://web.facebook.com/shopcircut/" title="">facebook</a></li>
                                <li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en"
                                        title="">twitter</a></li>
                                <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en"
                                        title="">instagram</a></li>
                                <li><i class="fa fa-google-plus-square"></i> <a
                                        href="https://plus.google.com/discover" title="">Google+</a></li>
                                <li><i class="fa fa-pinterest-square"></i> <a href="https://www.pinterest.com/"
                                        title="">Pintrest</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Navigate</h4>
                            </div>
                            <ul class="list-style">
                                <li><a href="about.html" title="">about us</a></li>
                                <li><a href="contact.html" title="">contact us</a></li>
                                <li><a href="terms.html" title="">terms & Conditions</a></li>
                                <li><a href="#" title="">RSS syndication</a></li>
                                <li><a href="sitemap.html" title="">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>useful links</h4>
                            </div>
                            <ul class="list-style">
                                <li><a href="#" title="">leasing</a></li>
                                <li><a href="#" title="">submit route</a></li>
                                <li><a href="#" title="">how does it work?</a></li>
                                <li><a href="#" title="">agent listings</a></li>
                                <li><a href="#" title="">view All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>download apps</h4>
                            </div>
                            <ul class="colla-apps">
                                <li><a href="https://play.google.com/store?hl=en" title=""><i
                                            class="fa fa-android"></i>android</a></li>
                                <li><a href="https://www.apple.com/lae/ios/app-store/" title=""><i
                                            class="ti-apple"></i>iPhone</a></li>
                                <li><a href="https://www.microsoft.com/store/apps" title=""><i
                                            class="fa fa-windows"></i>Windows</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- footer -->
        <div class="bottombar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates
                                Hub</a></span>
                        <i><img src="{{ asset('images/credit-cards.png') }}" alt=""></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side-panel">
        <h4 class="panel-title">General Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>use night mode</span>
                <input type="checkbox" id="nightmode1" />
                <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notifications</span>
                <input type="checkbox" id="switch22" />
                <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notification sound</span>
                <input type="checkbox" id="switch33" />
                <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>My profile</span>
                <input type="checkbox" id="switch44" />
                <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show profile</span>
                <input type="checkbox" id="switch55" />
                <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
            </div>
        </form>
        <h4 class="panel-title">Account Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>Sub users</span>
                <input type="checkbox" id="switch66" />
                <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>personal account</span>
                <input type="checkbox" id="switch77" />
                <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Business account</span>
                <input type="checkbox" id="switch88" />
                <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show me online</span>
                <input type="checkbox" id="switch99" />
                <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Delete history</span>
                <input type="checkbox" id="switch101" />
                <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
            </div>

        </form>
    </div>

    <!-- Modal To Post -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post" method="POST" enctype="multipart/form-data" id="post__main">
                        @csrf
                        <label for="post__title">Tiêu đề bài viết</label>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder=" Tiêu đề"
                                id="post__title">
                        </div>
                        <div class="mb-3">
                            <label for="post__text">Nội dung bài viết</label>
                            <textarea name="post" class="form-control" id="post__text" rows="3" placeholder=" Bạn đang nghĩ gì?"
                                style="resize:none"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="post__link">Link đính kèm bài viết</label>
                            <input type="url" name="link" class="form-control" id="post__link"
                                placeholder=" Thêm link bài viết">
                        </div>
                        <div>
                            <img id="image_preview" height="100%" width="100%" />
                        </div>

                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Thêm ảnh vào bài viết</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file"
                                name="image" onchange="loadFile(event)" />
                        </div>

                        <div class="btn btn__post">
                            <input class="btn btn-primary btn__post--post" type="submit" value="Đăng"
                                id="post__button" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <div class="dropdown-user-info">{{ Auth::user()->name }}</div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post" method="POST" enctype="multipart/form-data" id="post__main">
                        @csrf
                        <label for="post__title">Tiêu đề bài viết</label>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder=" Tiêu đề"
                                id="post__title">
                        </div>
                        <div class="mb-3">
                            <label for="post__text">Nội dung bài viết</label>
                            <textarea name="post" class="form-control" id="post__text" rows="3" placeholder=" Bạn đang nghĩ gì?"
                                style="resize:none">{{ $post->post }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="post__link">Link đính kèm bài viết</label>
                            <input type="url" name="link" class="form-control" id="post__link"
                                placeholder=" Thêm link bài viết">
                        </div>
                        <div>
                            <img id="image_preview" height="100%" width="100%" />
                        </div>

                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Thêm ảnh vào bài viết</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file"
                                name="image" onchange="loadFile(event)" />
                        </div>

                        <div class="btn btn__post">
                            <input class="btn btn-primary btn__post--post" type="submit" value="Đăng"
                                id="post__button" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}

    <!-- Modal To Update Avatar -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Thay đổi ảnh đại diện</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/avatar" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="img-box">
                            <img id="image_preview2" class="card-img-top">
                        </div>
                        <div class="card-body ">
                            <div class="mb-3 img-button">
                                <label for="formFile" class="btn form-label" style="cursor: pointer;"><i
                                        class="fa fa-plus"></i>
                                    Tải ảnh lên</label>
                                <input class="form-control" type="file" id="formFile" name="avatar"
                                    style="display:none; visibility: none; " onchange="loadAvatar(event)">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- side panel -->

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/map-init.js') }}"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script> --}}

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        let loadFile = function(event) {
            let image_preview = document.getElementById('image_preview');
            image_preview.src = URL.createObjectURL(event.target.files[0]);
            // console.log(image_preview);
        };

        let updatePostImage = function(event) {
            let image_preview3 = document.getElementById('image_preview3');
            image_preview3.src = URL.createObjectURL(event.target.files[0]);
            // console.log(image_preview);
        };

        let loadAvatar = function(event) {
            let image_preview2 = document.getElementById('image_preview2');
            image_preview2.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        $(document).on('click', '#post__button', function(e) {
            e.preventDefault();

            let form = document.getElementById('post__main');

            let formData = new FormData(form);

            console.log([...formData]);

            axios.post('/post', formData).then(function(response) {
                console.log(response.data);
                if (response.data.link != null || response.data.link_image != null || response.data
                    .image_name != null) {
                    $('.loadMore').prepend(
                        '<div class="central-meta item"><div class="user-post"><div class="friend-info"><figure><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></figure><div class="friend-name"><div class="d-flex flex-row"><ins><a href="{{ url('user/' . Auth::user()->id) }}" title="">{{ Auth::user()->name }}</a></ins></div><span>published: now</span></div><div class="post-meta"><a href="' +
                        response.data.link +
                        '">' + response.data.link + ' <img src="' + response.data.link_image +
                        '" alt=""> </a> <div><img src="/storage/post_image/' +
                        response.data.image_name +
                        '" alt="Image"></div> <div class="we-video-info"><ul><li><span class="views" data-toggle="tooltip" title="views"><i class="fa fa-eye"></i><ins>0</ins></span></li><li><span class="comment" data-toggle="tooltip" title="Comments"><i class="fa fa-comments-o"></i><ins>0</ins></span></li><li><span class="like" data-toggle="tooltip" title="like"><i class="ti-heart"></i><ins>0</ins></span></li><li><span class="dislike" data-toggle="tooltip" title="dislike"><i class="ti-heart-broken"></i><ins>0</ins></span></li><li class="social-media"><div class="menu"><div class="btn trigger"><i class="fa fa-share-alt"></i></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a></div></div></div></li></ul></div><div class="description"><h5 class="card-title">' +
                        response.data.title + '</h5><p class="card-text">' +
                        response.data.post + '</p></div></div></div></div></div>');
                } else {
                    $('.loadMore').prepend(
                        '<div class="central-meta item"><div class="user-post"><div class="friend-info"><figure><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></figure><div class="friend-name"><div class="d-flex flex-row"><ins><a href="{{ url('user/' . Auth::user()->id) }}" title="">{{ Auth::user()->name }}</a></ins></div><span>published: now</span></div><div class="post-meta"><div class="we-video-info"><ul><li><span class="views" data-toggle="tooltip" title="views"><i class="fa fa-eye"></i><ins>0</ins></span></li><li><span class="comment" data-toggle="tooltip" title="Comments"><i class="fa fa-comments-o"></i><ins>0</ins></span></li><li><span class="like" data-toggle="tooltip" title="like"><i class="ti-heart"></i><ins>0</ins></span></li><li><span class="dislike" data-toggle="tooltip" title="dislike"><i class="ti-heart-broken"></i><ins>0</ins></span></li><li class="social-media"><div class="menu"><div class="btn trigger"><i class="fa fa-share-alt"></i></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a></div></div><div class="rotater"><div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a></div></div></div></li></ul></div><div class="description"><h5 class="card-title">' +
                        response.data.title + '</h5><p class="card-text">' +
                        response.data.post + '</p></div></div></div></div></div>');
                }
                document.getElementById("post__main").reset();
                document.getElementById("image_preview").src = " ";
                $(".close").click();



            }).catch(function(error) {
                console.log(error);
            });
        });
    </script>


    <script>
        let commentBtn = document.querySelectorAll('.comment-button');
        for (let i = 0; i < commentBtn.length; i++) {
            commentBtn[i].onclick = function(e) {

                // $(document).on('click', '#post__comment--button', function(e) {
                // $('#post__comment--button').submit(function(e) {
                e.preventDefault();
                let post_id = e.target.getAttribute('data-id');
                console.log(post_id);
                let comment = $('#post__comment' + post_id).val();
                // console.log(comment);

                axios({
                    method: "POST",
                    url: "/comment/" + post_id,
                    data: {
                        comment: comment
                    }
                }).then(function(response) {
                    console.log(response.data);
                    $('#comment' + post_id).prepend(
                        '<li class="cmt_id' + response.data.id +
                        '"><div class="comet-avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt="avatar"></div><div class="we-comment"><div class="coment-head"><h5><a href="{{ url('/user/' . Auth::user()->id) }}" title="">{{ Auth::user()->name }}</a></h5><span>Seconds ago</span><div class="we-reply" title="Reply"><i class="fa fa-reply reply-button"></i></div></div><p id="comment--info' +
                        response.data.id + '">' +
                        response.data.comment + '</p></div></li>'
                    );
                    document.querySelectorAll(".post-comt-box textarea").reset();
                }).catch(function(error) {
                    console.log(error);
                });
            };
        }

        $(document).on('click', '#comment__button--update', function(e) {
            e.preventDefault();
            let comment_id = e.target.getAttribute("data-id");
            // console.log(comment_id);
            let comment = $('#comment__content--update' + comment_id).val();
            // console.log(comment);
            axios.put('/update_comment/' + comment_id, {
                comment: comment
            }).then(function(response) {
                console.log(response.data.data);

                $('#comment--info' + comment_id).html(response.data.data);
                document.getElementById("comment__update" + comment_id).reset();
                document.getElementById("exampleModal" + comment_id).classList.remove("show");
                document.getElementById("comment__content--update" + comment_id).innerHTML = response.data
                    .data;
                $('.modal-backdrop').remove();
                // document.querySelector('.antialiased').classList.remove("modal-open");
                // document.querySelector('.antialiased').style.reset();
                // alert('success');
            }).catch(function(error) {
                console.log(error);
            });
        });


        $(document).on('click', '#comment__button--delete', function(e) {
            e.preventDefault();
            let comment_id = e.target.getAttribute("data-id");
            console.log(comment_id);
            // confirm("Bạn muốn xóa bình luận này chứ?");
            let text = "Bạn muốn xóa bình luận này chứ?";
            if (confirm(text) == true) {
                axios.delete(
                    "/delete_comment/" + comment_id
                ).then(function(response) {
                    $('.cmt_id' + comment_id).remove();
                }).catch(function(error) {
                    console.log(error);
                });
            }
        });
    </script>

    <script>
        let repBtn = document.querySelectorAll('.reply-button');

        for (let i = 0; i < repBtn.length; i++) {
            repBtn[i].onclick = function(e) {
                e.preventDefault();
                let comment_id = e.target.getAttribute('data-id');

                let reply = $('#reply__comment' + comment_id).val();

                axios({
                    method: 'POST',
                    url: '/reply_comment/' + comment_id,
                    data: {
                        reply: reply,
                    }
                }).then(function(response) {

                    $('.reply_comment' + comment_id).prepend(
                        '<li class="reply_id' + response.data.id +
                        '"><div class="comet-avatar"><img src="{{ asset('/storage/avatar/' . Auth::user()->avatars->avatar_name) }}"alt="avatar"></div><div class="we-comment reply_id' +
                        response.data.id +
                        '"><div class="coment-head"><h5><a href="{{ url('user/' . Auth::user()->id) }}"title="">{{ Auth::user()->name }}</a></h5><span>Vừa xong</span></div><p>' +
                        response.data.reply + '</p></div></li>');
                }).catch(function(error) {
                    console.log(error);
                });
            }
        }

        

        $(document).on('click', '#reply__button--delete', function(e) {
            e.preventDefault();
            let reply_id = e.target.getAttribute("data-id");
            // console.log(reply_id);
            confirm("Are You sure want to delete this Reply !");
            axios.delete('/delete_reply/' + reply_id).then(function(response) {
                $('.reply_id' + reply_id).remove();
            }).catch(function(error) {
                console.log(error);
            })
        })
    </script>

    <script type="text/javascript">
        // const btnMessengerR = document.getElementById('messenger-button-right');
        const btnMessengerR = document.querySelectorAll('.messenger-button-right');
        // console.log(btnMessengerR);
        const messengerBoxR = document.querySelectorAll('.messenger-content-right');
        // console.log(messengerBoxR);
        // const friend_id_R = btnMessengerR.getAttribute('data-id');
        for (let i = 0; i < btnMessengerR.length; i++) {
            btnMessengerR[i].onclick = function(e) {
                // btnMessengerR.addEventListener('click', function(e) {
                const friend_id_R = btnMessengerR[i].getAttribute('data-id');

                const messenger = messengerBoxR[i].value;

                e.preventDefault();
                axios.post('/send-messenger/' + friend_id_R, {
                    messenger: messenger,
                }).then(function(response) {
                    console.log(response.data);
                    let html =
                        '<li class="you"><div class="chat-thumb"><img src="{{ asset('storage/avatar/' . Auth::user()->avatars->avatar_name) }}" alt=""></div><div class="notification-event"><span class="chat-message-item">' +
                        response.data.messenger +
                        '</span><span class="notification-date"><time datetime="2004-07-24T18:18"class="entry-date updated">Vừa xong</time></span></div></li>';
                    document.getElementById('input-box-right').reset();
                    document.getElementById('chat-list-right-' + response.data.friend_id).insertAdjacentHTML(
                        "beforeend", html);
                }).catch(function(error) {
                    console.log(error);
                });
            };
        }
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
</body>

</html>
