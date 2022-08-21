<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Register Screen</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box--header">
            <h2>Register Screen</h2>
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

        <div class="login__box register__box--card">
            <form action="/register" method="POST">
                @csrf
                <div class="container">

                    <div class="form__group">
                        <input type="text" name="name" class="form__input" placeholder="Name" />
                    </div>

                    <div class="form__group">
                        <input type="text" name="email" class="form__input" placeholder="Email" />
                    </div>

                    <div class="form__group">
                        <input type="password" name="password" class="form__input" placeholder="Password" required />
                    </div>

                    <div class="form__group">
                        <input type="password" name="retypepassword" class="form__input" placeholder="Retype Password"
                            required />
                    </div>

                    <div class="form__group">
                        <input type="date" name="date" class="form__input" placeholder="Date of Birth" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="location" class="form__input" placeholder="Location" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="title" class="form__input" placeholder="Title" required />
                    </div>

                    <div class="form__group">

                    </div>
                </div>

                <div class='btn'>
                    <div class='btn btn__checkbox'>
                        <input type="checkbox" name='term'>
                        <label for="term">I agree to term</label>
                    </div>

                    <div class="btn btn__submit ">
                        <div>
                            <input class="btn__submit btn__submit--login" type="submit" value="Register" />
                        </div>
                    </div>
                </div>

                <div class="link link__back">
                    <a href="/">Back to Login Screen</a>
                </div>
            </form>
            @if (session()->has('notmatch'))
                <script>
                    alert('{{ session('notmatch') }}');
                </script>
            @endif
        </div>
    </div>
</body>

</html>
