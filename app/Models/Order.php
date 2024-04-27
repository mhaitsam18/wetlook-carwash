<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'orders';

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'booking',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
