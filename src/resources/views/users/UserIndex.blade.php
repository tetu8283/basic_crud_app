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
                <th>プロフィール画像</th>
                <th>名前 </th>
                <th>メールアドレス</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <!-- プロフィール画像の表示 -->
                        <img src="{{ $user->profile_image_url }}" alt="プロフィール画像" width="100" height="100">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">編集</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="toMicropostIndex">
        <a href="{{ route('posts.index')}}">投稿一覧</a>
    </div>
</body>
</html>
