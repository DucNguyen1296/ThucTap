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
    <title>Update Information</title>
</head>

<body>
    <div class="login__box">
        <div class="login__box--header">
            <h2>Thay đổi thông tin cá nhân</h2>
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

        <div class="container">
            <!-- Content here -->
            <form action="/edit_profile" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                        placeholder="Name" value="{{ $data->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ngày sinh nhật</label>
                    <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                        value="{{ $data->date }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                    <input type="text" name="location" class="form-control" id="exampleFormControlInput1"
                        placeholder="Địa chỉ" value="{{ $data->location }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề trạng thái</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                        placeholder="Trạng thái" value="{{ $data->title }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhập</button>
            </form>
        </div>
    </div>
</body>

</html>
