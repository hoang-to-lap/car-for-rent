<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class NewsCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'news_categories';
    protected $fillable = ['name', 'slug'];
    
}
