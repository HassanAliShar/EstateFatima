<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function plot(){
        return $this->belongsTo(Plot::class,'plot_id');
    }

    public function installments()
    {
        return $this->hasMany(Booking_installment::class);
    }

    public function booking_order(){
        return $this->belongsTo(Booking_order::class,'booking_orders_id');
    }
}
