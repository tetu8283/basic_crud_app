<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Micropost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MicropostController extends Controller
{
    public function create()
    {
        return view('microposts.MicropostCreate');
    }

    // 投稿データの保存処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'any_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像アップロードの処理
        $imagePath = null;
        if ($request->hasFile('any_image')) {
            $imagePath = $request->file('any_image')->store('microposts', 'public');
        }

        // 投稿を保存
        Micropost::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'any_image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        // 成功メッセージとともに一覧画面へリダイレクト
        return redirect()->route('microposts.index')->with('success', '投稿が作成されました。');
    }

    public function index()
    {
        $user = Auth::user();
        $microposts = Micropost::paginate(20);

        return view('microposts.MicropostIndex', compact('user', 'microposts'));
    }

    public function edit(Micropost $micropost)
    {
        //
    }

    public function update(Request $request, Micropost $micropost)
    {

    }
}
