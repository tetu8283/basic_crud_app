<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿一覧</title>
</head>
<body>
    <header class="microposts-index-header">
        <h1>投稿一覧</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </header>

    <div class="conpact-profile">
        {{-- ログイン中のユーザ名とプロフの画像を表示 --}}
        <a href="{{ route('users.edit', $user->id) }}">
            <img src="{{ $user->profile_image_url }}" alt="プロフィール画像" width="100" height="100">
        </a>
            <p>{{ $user->name }} </p>
        </div>

    <div class="toMicropostCreate">
        <a href="{{ route('microposts.create') }}">投稿作成</a>
    </div>

    {{-- 成功メッセージの表示 --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- 投稿一覧のテーブル表示 --}}
    <table border="1" cellspacing="0" cellpadding="10">
        <tbody>
            @forelse ($microposts as $micropost)
                <tr>
                    <td>{{ $micropost->title }}</td>
                    <td>{{ $micropost->user->name ?? '不明' }}</td>
                    <td>{{ $micropost->content }}</td>
                    <td>{{ $micropost->created_at->format('Y-m-d') }}</td>
                    <td>
                        {{-- 画像があれば投稿し、なければそのまま --}}
                        @if ($micropost->any_image_url)
                            <img src="{{ $micropost->any_image_url }}" alt="投稿画像" width="100" height="100">
                        @endif
                    </td>
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
