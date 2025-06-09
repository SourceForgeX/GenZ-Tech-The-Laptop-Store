<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $primaryKey = 'laptopid';
    protected $fillable = ['laptopname', 'modelid','image1','image2', 'price','screensize','color','harddisk','processor','cpumodel','ram','os','graphics', 'stock','warranty','features'];
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brandid', 'brandid');
    }
    public function lapmodel()
    {
        return $this->belongsTo(lapmodel::class, 'modelid', 'modelid');
    }
}
