<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    {{-- ログアウトボタン --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>

    {{-- ログイン中のユーザー名を表示 --}}
    <p>こんにちは, {{ $user->name }} さん</p>

    <div class="toUserIndex">
        <a href="{{ route('users.index') }}">ユーザ一覧</a>
    </div>

    {{-- 成功メッセージの表示 --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- 投稿一覧のテーブル表示 --}}
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>投稿者名</th>
                <th>投稿日</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($microposts as $micropost)
                <tr>
                    <td>{{ $micropost->title }}</td>
                    <td>{{ $micropost->user->name ?? '不明' }}</td>
                    <td>{{ $micropost->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">投稿がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ページネーションリンク --}}
    <div>
        {{ $microposts->links() }}
    </div>
</body>
</html>
