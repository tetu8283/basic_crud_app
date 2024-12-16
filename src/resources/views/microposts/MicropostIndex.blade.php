<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
    <p>Hello Index</p>

    {{-- ログアウトボタン --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            ログアウト
        </button>
    </form>

    {{-- $userオブジェクトのnameを取得し、ログイン中のユーザーの名前を表示 --}}
    <p>Hello {{ $user->name }}</p> 
    <p>Email：{{ $user->email }}</p> 
    <p>Password：{{ $user->password}}</p> 
</body>
</html>