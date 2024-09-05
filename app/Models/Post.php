<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['title', 'content', 'user_id', 'author'];

    protected static function booted()
    {
        static::creating(function (Post $post) {
            if(auth()->check()) {
                $post->user_id = Auth::id();
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
