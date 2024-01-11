<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'reponse',
        'user_id',
        'comment_id',
        'is_admin',
    ];

    protected $with = [
        'user',
    ];

    function comment():BelongsTo{
        return $this->belongsTo(Comment::class);
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
