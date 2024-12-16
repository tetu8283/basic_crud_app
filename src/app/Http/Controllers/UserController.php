<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10); # 1ページ10件で表示
        # compactを使用して、viewのforeachの$usersにデータを渡す
        return view('users.UserIndex', compact('users'));
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        // 編集するユーザーを取得(見つからなければ404になる)
        $user = User::findOrFail($id);
        return view('users.UserEdit', compact('user')); # viewにu更新したuserを渡す
    }

    public function update(Request $request, string $id)
    {
        // バリデーション設定
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ユーザー情報を更新
        $user = User::findOrFail($id);

        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('profile_images','public'); // strage/public/profile_imagesに画像を保存

            if($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $user->profile_image = $path; // 新しい画像のパスを保存
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        // ユーザー一覧にリダイレクト
        return redirect()->route('users.index')->with('success', 'ユーザー情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
