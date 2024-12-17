<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MicropostController;

use Illuminate\Support\Facades\Route;

// ユーザ作成はBreezeで行うため除外する(showはシンプルに使わない)
Route::resource('/users', UserController::class)->except(['store', 'create', 'show']);
Route::resource('/microposts', MicropostController::class)->except(['index']);

Route::get('/microposts', [MicropostController::class, 'index'])
    // authはユーザのログインを、verifiedはメアドが確認済みかを確認する
    ->middleware(['auth', 'verified']) // アクセスする前にauthとverifiedというミドルウェアが実行される
    ->name('microposts.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
