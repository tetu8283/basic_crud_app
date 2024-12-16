<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザ一覧</title>
</head>
<body>
    <p>ユーザ一覧</p>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前 </th>
                <th>メールアドレス</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>