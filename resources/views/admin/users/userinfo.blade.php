<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello</h1>
    <div>{{Session::get('success')}}</div>
    <table class="table" border="#000" cellpadding="20">
        <tr class="table__header">
            <th>ID</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Date of Birth</th>
            <th>Location</th>
            <th>Title</th>
            <th>Tools</th>
        </tr>
        @foreach ($user as $us)
            <tr class="table__row">
                <th>{{ $us->id }}</th>
                <th>{{ $us->name }}</th>
                <th>{{ $us->email }}</th>
                <th>{{ $us->date }}</th>
                <th>{{ $us->location }}</th>
                <th>{{ $us->title }}</th>
                <th>
                    <form action="/admin_edit_user">
                        @csrf
                        <div>
                            <input type="submit" name="edit" value="Edit">
                        </div>
                    </form>

                    <form action="{{ route('admin.user.delete', ['id' => $us->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div>
                            <input type="submit" value="Delete">
                        </div>
                    </form>

                </th>
            </tr>
        @endforeach


    </table>
</body>

</html>
