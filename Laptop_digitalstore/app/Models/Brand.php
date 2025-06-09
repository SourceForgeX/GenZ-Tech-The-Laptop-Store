<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'brandid';
    protected $fillable = ['brandname', 'logo'];
    use HasFactory;
}
