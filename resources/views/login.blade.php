<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <title>Login Screen</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box login__box--header">
            <h2>Login Screen</h2>
        </div>

        <div class="login__box login__box--card">
            <form action="/submit" method="POST">
                @csrf
                <div class="container">

                    <div class="form__group">
                        <input type="text" name="email" class="form__input" placeholder="Email" required />
                    </div>

                    <div class="form__group">
                        <input type="password" name="password" class="form__input" placeholder="Password" required />
                    </div>

                </div>
                <div class='btn'>
                    <div class='btn btn__checkbox'>
                        <input type="checkbox" name='remember'>
                        <label for="remember">Remember me</label>
                    </div>

                    <div class="btn btn__submit ">
                        <div>
                            <input class="btn__submit btn__submit--login" type="submit" value="Sign In" />
                        </div>
                    </div>
                </div>

                <div class="link">
                    <div class="link link__password">
                        <a href="/forgot_password">Forgot your Password?</a>
                    </div>

                    <div class="link link__register">
                        <a href="/register">Register for membership</a>
                    </div>
                </div>

            </form>

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
        </div>
    </div>
</body>

</html>
