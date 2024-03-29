<?php

namespace App\Models;

use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statut extends Model
{
    use HasFactory;

    function voyages():HasMany{
        return $this->hasMany(Voyage::class);
    }

    function ticket():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
