<?php

namespace App\Http\Controllers;

use App\Models\Micropost;
use Illuminate\Support\Facades\Auth;

class MicropostController extends Controller
{
    public function index()
    {
        // ログイン中のuserを取得
        $user = Auth::user();
        return view('microposts.MicropostIndex', compact('user'));
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
