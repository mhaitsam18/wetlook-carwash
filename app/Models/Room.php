<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    // protected $table = 'rooms';

    protected $guarded = [
        'id'
    ];

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
