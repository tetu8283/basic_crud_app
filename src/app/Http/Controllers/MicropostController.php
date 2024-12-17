<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Micropost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MicropostController extends Controller
{
    public function create(Request $request) {
        // バリデーション設定
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|email|max:255|unique:users,email,',
            // JPEG、PNG、JPG、GIF形式で2MB以下
            'any_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if($request->hasFile('any_image')) {
            $imagePath = $request->file('any_image')->store('microposts', 'public');
        }

    }

    public function index()
    {
        $user = Auth::user();
        $microposts = Micropost::paginate(20);

        return view('microposts.MicropostIndex', compact('user', 'microposts'));
    }

    public function show(Micropost $micropost)
    {
        //
    }

    public function edit(Micropost $micropost)
    {
        //
    }

    public function update(Request $request, Micropost $micropost)
    {

    }
}
