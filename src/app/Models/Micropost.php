<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Micropost extends Model
{
    protected $fillable = [
        'title',
        'content',
        'any_image',
        'user_id'
    ];

    // リレーション(多対1)
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getAnyImageUrlAttribute()
    {
        // 画像があれば返し、なければnullを返す
        return $this->any_image ? Storage::url($this->any_image) : null;
    }

}
