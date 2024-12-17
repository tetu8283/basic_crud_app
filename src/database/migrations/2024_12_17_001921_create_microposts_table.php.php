<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('microposts', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 外部キー
            $table->string('title'); // タイトル
            $table->text('content'); // 内容
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microposts');
    }
};
