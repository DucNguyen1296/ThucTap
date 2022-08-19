<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Update Information</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box--header">
            <h2>Update Information Screen</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login__box register__box--card">
            <form action="/edit_profile" method="POST">
                @csrf
                <div class="container">

                    <div class="form__group">
                        <input type="text" name="name" class="form__input" placeholder="Name"
                            value="{{ $data->name }}" required />
                    </div>

                    <div class="form__group">
                        <input type="date" name="date" class="form__input" placeholder="Date of Birth"
                            value="{{ $data->date }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="location" class="form__input" placeholder="Location"
                            value="{{ $data->location }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="title" class="form__input" placeholder="Title"
                            value="{{ $data->title }}" required />
                    </div>
                </div>

                <div class='btn'>
                    <div class="btn btn__submit ">
                        <div>
                            <input class="btn__submit btn__submit--login" type="submit" value="Update" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
