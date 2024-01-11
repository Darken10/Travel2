<?php

namespace App\Models\Post;

use App\Models\Post;
use App\Models\User;
use App\Models\Post\Reponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];

    protected $with = [
        'user',
        'reponses'
    ];

    function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function reponses(): HasMany
    {
        return $this->hasMany(Reponse::class);
    }
}
