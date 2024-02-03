<?php

namespace App\Models\Root;

use App\Models\Root\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;

    protected $with = [
        'province',
    ];
    
    protected $fillable = [
        'name',
        'province_id'
    ];


    function province():BelongsTo{
        return $this->belongsTo(Province::class);
    }
}
