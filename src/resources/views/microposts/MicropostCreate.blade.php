<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿作成</title>
</head>
<body>
    <div class="micropost-header">
        <h1>新規投稿作成</h1>
        <div class="toMicropostIndex">
            <a href="{{ route('microposts.index')}}">投稿一覧</a>
        </div>
    </div>

    <div class="create-micropost">
        <form action="{{ route('microposts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <input type="text" placeholder="タイトル" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <textarea placeholder="内容" name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <div>
                <input type="file" name="any_image" id="any_image">
            </div>

            <button type="submit">投稿</button>
        </form>
    </div>
</body>
</html>
