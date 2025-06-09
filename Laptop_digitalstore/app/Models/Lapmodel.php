<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapmodel extends Model
{
    protected $primaryKey = 'modelid';
    protected $fillable = ['modelname', 'brandid'];
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brandid', 'brandid');
    }

}

