<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(CarImage::class , foreignKey:'car_id');
    }
    public function category(){
        return $this->belongsTo(Category::class , foreignKey:'category_id');
    }
    public function carImages(){
        return $this->hasMany(CarImage::class , foreignKey:'car_id');
    }
}
