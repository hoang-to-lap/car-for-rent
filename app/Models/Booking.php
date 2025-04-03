<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'phone_number', 'start_date', 'end_date', 'pickup_location', 'car_id', 'status'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
