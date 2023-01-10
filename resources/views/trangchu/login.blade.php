<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Fakebook</title>
    <link rel="icon" href="{{ asset('/storage/logo/facebook.png') }}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>Fakebook</h1>
                            <p>
                                Fakebook is free to use for as long as you want with active projects.
                            </p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                            <a href="#" title="" class="folow-me">Follow Us on</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Login</h2>
                            <form action="{{ route('user.login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" id="input" required="required" />
                                    <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Password</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name='remember' checked="checked" /><i
                                            class="check-box"></i>Always
                                        Remember Me.
                                    </label>
                                </div>
                                <a href="#" title="" class="forgot-pwd">Forgot Password?</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>Login</span></button>
                                    <button class="mtr-btn signup" type="button"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="log-reg-area reg">
                            <h2 class="log-title">Register</h2>
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" required="required" />
                                    <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_email" required="required" />
                                    <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="reg_password" required="required" />
                                    <label class="control-label" for="input">Password</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="retypepassword" required="required" />
                                    <label class="control-label" for="input">Retype Password</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="date" required="required" />
                                    <label class="control-label" for="input">Date</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" required="required" />
                                    <label class="control-label" for="input">Location</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" required="required" />
                                    <label class="control-label" for="input">Title</label><i
                                        class="mtrl-select"></i>
                                </div>


                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="term" checked="checked" /><i
                                            class="check-box"></i>Accept
                                        Terms & Conditions ?
                                    </label>
                                </div>
                                <a href="#" title="" class="already-have">Already have an account</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signup" type="submit"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
@if (session()->has('notmatch'))
    <script>
        alert('{{ session('notmatch') }}');
    </script>
@endif
@if (session()->has('incorrect'))
    <script>
        alert('{{ session('incorrect') }}');
    </script>
@endif

@if (session()->has('regiscorrect'))
    <script>
        alert('{{ session('regiscorrect') }}');
    </script>
@endif

@if (session()->has('reset_password'))
    <script>
        alert('{{ session('reset_password') }}');
    </script>
@endif

</html>
