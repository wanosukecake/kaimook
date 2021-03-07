<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'hour', 'minutes', 'number', 'type', 'added_progress',
    ];

    protected $casts = [
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

    // 公開記事一覧取得
    public function scopeLatestList(Builder $query, int $userId)
    {
        return $query
            ->latest('created_at')
            ->where('user_id',$userId);
    }

    // 公開記事をIDで取得
    public function scopePublicFindByIdUserId(Builder $query, int $id, $userId)
    {
        return $query->where('user_id',$userId)->findOrFail($id);
    }
}