<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Change Password Screen</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box login__box--header">
            <h2>Thay đổi mật khẩu cá nhân</h2>
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

        <div class="container">
            <form action="/change_password" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mật khẩu hiện tại</label>
                    <input type="password" name="old_password" class="form-control" id="exampleFormControlInput1"
                        placeholder="Old Password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mật khẩu mới</label>
                    <input type="password" name="new_password" class="form-control" id="exampleFormControlInput1"
                        placeholder="New Password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nhập lại mật khẩu mới</label>
                    <input type="password" name="retype_newpassword" class="form-control" id="exampleFormControlInput1"
                        placeholder="Confirm New Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
            </form>
        </div>
    </div>
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
</body>

</html>
