<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MicropostController;

use Illuminate\Support\Facades\Route;

Route::get('/post_index', [MicropostController::class, 'index'])
    // アクセスする前にauthとverifiedというミドルウェアが実行される
    // authはユーザのログインを、verifiedはメアドが確認済みかを確認する
    ->middleware(['auth', 'verified'])
    ->name('index_page'); // 名前をつける

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
