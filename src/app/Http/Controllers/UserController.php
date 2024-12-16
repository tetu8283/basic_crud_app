<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 編集するユーザーを取得(見つからなければ404になる)
        $user = User::findOrFail($id);
        return view('users.UserEdit', compact('user')); # viewにu更新したuserを渡す
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // バリデーション設定
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        // ユーザー情報を更新
        $user = User::findOrFail($id);
        $user->update($validated);

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
