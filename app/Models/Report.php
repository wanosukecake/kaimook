<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'hour', 'minutes', 'number', 'type', 'is_public', 'published_at'
    ];

    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
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

    // 公開のみ表示
    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    // 公開記事一覧取得
    public function scopePublicList(Builder $query, int $userId)
    {
        return $query
            ->public()
            ->latest('published_at')
            ->where('user_id',$userId);
    }

    // 公開記事をIDで取得
    public function scopePublicFindByIdUserId(Builder $query, int $id, $userId)
    {
        return $query->public()->where('user_id',$userId)->findOrFail($id);
    }
}