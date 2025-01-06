<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventBooking;
use Illuminate\Database\Eloquent\Model;

class GuestUploads extends Model
{
    public function eventBooking()
    {
        return $this->belongsTo(EventBooking::class);
    }
}
