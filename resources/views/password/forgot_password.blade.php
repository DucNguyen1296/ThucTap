<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/style.css') }}">
    <title> Password Screen</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box login__box--header">
            <h2>Forgot Password Screen</h2>
        </div>

        <div class="login__box login__box--card">
            <form action="/forgot_password" method="POST">
                @csrf
                <div class="container">
                    <p>Vui lòng nhập tên đăng nhập của bạn</p>
                    <div class="form__group">
                        <input type="text" name="user_name" class="form__input" placeholder="Your Name" required />
                    </div>
                </div>
                <div class='btn'>
                    <div class="btn btn__submit--changepsw ">
                        <input class="btn__submit btn__submit--changepsw" type="submit" value="Submit" />
                    </div>
                </div>

            </form>

        </div>
    </div>
</body>

</html>
