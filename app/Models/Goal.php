<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'goal', 'progress'
    ];

    protected static function boot()
    {
        parent::boot();
        self::saving(function($post) {
            $post->user_id = \Auth::id();
            $post->is_expired = 0;
        });
    }

    // アソシーエション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 期限が切れていないもののみ取得
    public function scopeNotExpired(Builder $query)
    {
        return $query->where('is_expired', 0);
    }

}
