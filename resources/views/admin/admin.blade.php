<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>

<body>
    <h1>Đây là trang quản trị admin</h1>
    <p>Xin chào {{ $admin_data->name }}</p>
    

    <a href="/user_info">Users Controll</a>

    <div class='logout'>
        <a href="/logout">Đăng xuất</a>
    </div>
    @if (session()->has('admin_index'))
        <script>
            alert('{{ session('admin_index') }}');
        </script>
    @endif
</body>

</html>
