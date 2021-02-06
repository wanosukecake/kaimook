<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'progress'
    ];

    protected static function boot()
    {
        parent::boot();
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    }

    // アソシーエション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
