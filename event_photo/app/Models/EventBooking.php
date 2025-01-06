<?php

namespace App\Models;

use App\Models\GuestUploads;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    public function images(){
        return $this->hasMany(GuestUploads::class);
    }
}
