<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User edit page</title>
</head>
<body>
    <h1>ユーザ編集ページ</h1>

    {{-- 更新のルートとidを引数にする --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="name">名前:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        <button type="submit">更新</button>
    </form>
</body>
</body>
</html>