<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/style.css') }}">
    <title>Reset Password Screen</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box login__box--header">
            <h2>Reset Password Screen</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="login__box login__box--card">
            <form action="{{ route('user.reset.password', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="container">

                    <div class="form__group">
                        <input type="password" name="new_password" class="form__input" placeholder="New Password"
                            required />
                    </div>

                    <div class="form__group">
                        <input type="password" name="retype_newpassword" class="form__input"
                            placeholder="Confirm New Password" required />
                    </div>

                </div>
                <div class='btn'>
                    <div class="btn btn__submit--changepsw ">
                        <input class="btn__submit btn__submit--changepsw" type="submit" value="Submit" />
                    </div>
                </div>

            </form>

            @if (session()->has('old_password'))
                <script>
                    alert('{{ session('old_password') }}');
                </script>
            @endif

            @if (session()->has('notmatch'))
                <script>
                    alert('{{ session('notmatch') }}');
                </script>
            @endif

        </div>
    </div>
</body>

</html>
