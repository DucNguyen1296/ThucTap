<html>

<head>
    <title>Forgot your Password</title>
</head>

<body>

    <h1>Hello, {{ $user->name }} !!!</h1>
    <div>
        Someone has requested a link to change your password. You can do this through the button below.
    </div>
    <div>
        Here is your link to reset your password : <a
            href="{{ route('user.reset.index', ['id' => $user->id, 'user' => $user]) }}">Reset
            my password</a>
    </div>
    <div>
        If you don't need that, please ignore this email. Your password will stay safe like before and won't change.
    </div>
    {{-- <p>{{ $user['info'] }}</p> --}}
    <p>Thank you</p>
</body>

</html>
