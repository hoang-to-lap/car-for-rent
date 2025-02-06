<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(CarImage::class , foreignKey:'car_id');
    }
}
