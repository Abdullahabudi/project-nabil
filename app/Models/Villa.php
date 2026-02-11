<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $fillable = [
        'name',
        'location',
        'price_per_night',
        'capacity',
        'description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
