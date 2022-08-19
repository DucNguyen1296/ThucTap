<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing</title>
</head>

<body>
    {{-- <a href="{{route('profile',['name'=>$name->name])}}"></a> --}}
    <h2>Welcome to Laravel {{ $user->name }} </h2>
    <div>Email: {{ $user->email }}</div>
    <div>Password:{{ $user->password }} </div>
    <div>Chúc ngày mới tốt lành. Số thứ tự của bạn là {{ $user->id }}.</div>
    <div>Sinh nhật của bạn là {{ $user->date }}. Địa chỉ của bạn là {{ $user->location }}.</div>
    <div>Ghi chú của bạn: {{ $user->title }}</div>
    <div class='logout'>
        <a href="/logout">Đăng xuất</a>
    </div>
</body>

</html>
