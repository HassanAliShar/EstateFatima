<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_agent extends Model
{
    use HasFactory;

    public function agbookings(){
        return $this->hasMany(Booking_order::class,'sub_agent_id');
    }

    public function installments(){
        return $this->hasMany(Booking_installment::class,'sub_agent_id');
    }
}
