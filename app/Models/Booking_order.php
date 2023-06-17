<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_order extends Model
{
    use HasFactory;
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function agent_bookings()
    {
        return $this->hasOne(Booking::class,'booking_orders_id');
    }

    public function sub_agent(){
        return $this->hasOne(Sub_agent::class,'id');
    }

    public function sub_agent_get(){
        return $this->belongsTo(Sub_agent::class,'sub_agent_id');
    }
}
