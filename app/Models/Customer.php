<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at','created_at','updated_at'];

    public function nominees()
    {
        return $this->hasMany(Nominee::class);
    }

    public function nominee()
    {
        return $this->hasOne(Nominee::class,'customer_id');
    }

    public function booking(){
        return $this->hasOne(Booking::class,'customer_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function booking_orders()
    {
        return $this->hasOne(Booking_order::class,'customer_id');
    }
    public function installments()
    {
        return $this->hasMany(Booking_installment::class);
    }
}
