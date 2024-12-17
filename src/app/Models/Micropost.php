<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
