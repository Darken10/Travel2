<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Compagnie;
use App\Models\Post\Like;
use App\Models\Post\Reponse;
use App\Models\Post\LikeComment;
use App\Models\Post\LikeReponse;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profileUrl'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    function posts():HasMany{
        return $this->hasMany(Post::class);
    }

    function reponses():HasMany{
        return $this->hasMany(Reponse::class);
    }

    function likes():HasMany{
        return $this->hasMany(Like::class);
    }

    function likeComments():HasMany{
        return $this->hasMany(LikeComment::class);
    }

    function likeReponse():HasMany{
        return $this->hasMany(LikeReponse::class);
    }

    function compagnie():BelongsTo{
        return $this->belongsTo(Compagnie::class);
    }
}
