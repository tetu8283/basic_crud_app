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
                    <td>
                        {{-- ルートのusers.updateとidを引数に与える --}}
                        <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="toMicropostIndex">
        <a href="{{ route('posts.index')}}">投稿一覧</a>
    </div>
</body>
</html>