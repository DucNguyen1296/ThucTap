<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Edit User Information</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box--header">
            <h2>Edit User Information</h2>
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
            <form action="{{ route('admin.user.edit', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="container">

                    <div class="form__group">
                        <input type="text" name="name" class="form__input" placeholder="Name"
                            value="{{ $user->name }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="email" class="form__input" placeholder="Email"
                            value="{{ $user->email }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="password" class="form__input" placeholder="Password" required />
                    </div>

                    <div class="form__group">
                        <input type="date" name="date" class="form__input" placeholder="Date of Birth"
                            value="{{ $user->date }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="location" class="form__input" placeholder="Location"
                            value="{{ $user->location }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="title" class="form__input" placeholder="Title"
                            value="{{ $user->title }}" required />
                    </div>

                    <div class="form__group">
                        <input type="text" name="role" class="form__input" placeholder="Role"
                            value="{{ $user->role }}" required />
                    </div>
                </div>

                <div class='btn'>
                    <div class="btn btn__submit--edit ">
                        <div>
                            <input class="btn__submit btn__submit--edit" type="submit" value="Update" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
