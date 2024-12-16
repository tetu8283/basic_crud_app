<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    // ユーザ一覧
    public function index()
    {
        $users = User::paginate(10); # 1ページ10件で表示
        # 「users.UserIndex」でuserディレクトリのUserIndex.blade.phpを返し、compactを使用してviewのforeachの$usersにデータを渡す
        return view('users.UserIndex', compact('users'));
    }

    // ユーザ編集
    public function edit(string $id)
    {
        // 編集するユーザーを取得(見つからなければ404になる)
        $user = User::findOrFail($id);
        return view('users.UserEdit', compact('user')); # viewに更新したいuserを渡す
    }

    // アップデート処理
    public function update(Request $request, string $id)
    {
        // バリデーション設定
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            // JPEG、PNG、JPG、GIF形式で2MB以下
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id); // ユーザが見つからなければ404

        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image'); // ファイル取得
            $path = $file->store('profile_images','public'); // strage/public/profile_imagesに画像を保存し、パスを取得

            if($user->profile_image) {
                // publicのdiskにあるuserが保持しているprofile_imageをdeleteする
                Storage::disk('public')->delete($user->profile_image);
            }

            $user->profile_image = $path; // 新しい画像のパスをユーザのprifile_imageのパスに保存
        }

        // formから送られたnameとemailを保存
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        // ユーザー一覧にリダイレクト
        return redirect()->route('users.index')->with('success', 'ユーザー情報を更新しました。');
    }

    // 削除処理
    public function destroy(string $id)
    {
        // ユーザ取得->削除->リダイレクト
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','ユーザを削除しました');
    }
}
