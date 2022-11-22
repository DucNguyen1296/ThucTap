<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/loginstyle.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <title>FAKEBOOK</title>
</head>

<body>
    <div class="main">
        <div class="loginBox">
            <img src="{{ asset('/storage/logo/default.png') }}" alt="" class="user" />
            <h2>Login to Connecting</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user.login') }}" method="POST">
                @csrf
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter Email" required />
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter your password" required />
                <input type="submit" value="Sign in" />
                <div class="checkbox">
                    <input type="checkbox" name='remember'>
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a href="/forgot_password">Forgot your password?</a>
                </div>
                <div>
                    <a href="/register">Register for membership</a>
                </div>
            </form>
        </div>
    </div>
</body>
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
