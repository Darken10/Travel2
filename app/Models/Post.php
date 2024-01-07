<?php

namespace App\Models;

use App\Models\Post\Image;
use App\Models\Post\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $with = [
        'images',
        'tags'
    ];

    function images():BelongsToMany{
        return $this->belongsToMany(Image::class);
    }

    function tags():BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
