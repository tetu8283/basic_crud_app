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

    {{-- 更新のルートとidを引数にする(画像を投稿するため、enctype以降を記述) --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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

        <div>
            <label for="profile_image">プロフィール画像:</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>

        <!-- 現在のプロフィール画像を表示 -->
        <div>
            <img src="{{ $user->profile_image_url }}" alt="現在のプロフィール画像" width="100">
        </div>

        <button type="submit">更新</button>
    </form>
</body>
</body>
</html>
