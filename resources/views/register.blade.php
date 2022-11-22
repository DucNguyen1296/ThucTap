<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/oldCss/registerstyle.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/storage/logo/facebook.png') }}">
    <title>FAKEBOOK</title>
</head>

<body>
    <div class="main">
        <div class="loginBox">
            <img src="{{ asset('/storage/logo/default.png') }}" alt="" class="user" />
            <h2>Register now</h2>
            <form action="/register" method="POST">
                @csrf
                <p>Name</p>
                <input type="text" name="name" placeholder="Enter Name" />
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter Email" />
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter your password" />
                <p>Retype Password</p>
                <input type="password" name="retypepassword" placeholder="Retype your password" />
                <p>Date of Birth</p>
                <input type="date" name="date" />
                <p>Location</p>
                <input type="text" name="location" placeholder="Enter your location" />
                <p>Title</p>
                <input type="text" name="title" placeholder="Enter your title" />
                <div class="checkbox">
                    <input type="checkbox" name="term" required />
                    <label for="term">
                        <a href="#">
                            I agree to term
                        </a>
                    </label>
                </div>
                <input type="submit" value="Register" />
                <a href="/">Back to Login Screen</a>
            </form>
        </div>
    </div>
</body>
@if (session()->has('notmatch'))
    <script>
        alert('{{ session('notmatch') }}');
    </script>
@endif


</html>
