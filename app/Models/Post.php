<?php

namespace App\Models;

use App\Models\Post\Tag;
use App\Models\Post\Image;
use Illuminate\Support\Str;
use App\Models\Post\Comment;
use App\Models\Post\Reponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    private $limiteTitle = 45;
    private $limiteContent = 200;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $with = [
        'images',
        'tags',
        'comments',
        'user'
    ];

    function titleExtrait():string{
        return Str::limit($this->title,$this->limiteTitle);
    }

    function contentExtrait():string{
        return Str::limit($this->title,$this->limiteContent);
    }

    function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    function countComments(): int
    {
        return count($this->comments);
    }

    
}
