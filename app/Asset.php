<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $appends = [
        'is_expired',
        'expiry_in_days',
        'availability'
    ];


    public function getExpiryInDaysAttribute()
    {
        return now()
        ->parse($this->expired_date)
        ->diffInDays(now());
    }

    public function getIsExpiredAttribute()
    {
        return now()
        ->parse($this->expired_date)
        ->lt(now());
    }

     public function getAvailabilityAttribute()
    {
        return $this->current_owned_by == null? 'Available' : 'Not available';
    }

    public function ownedBy()
    {
        return $this->belongsTo(User::class,'current_owned_by','id');
    }
}
