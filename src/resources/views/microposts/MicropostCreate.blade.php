<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Micropost</title>
</head>
<body>
    <div class="create-micropost">
        <form action="{{ route('microposts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">タイトル:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="content">内容:</label>
                <textarea name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <div>
                <label for="any_image">画像:</label>
                <input type="file" name="any_image" id="any_image">
            </div>

            <button type="submit">投稿</button>
        </form>
    </div>
</body>
</html>
