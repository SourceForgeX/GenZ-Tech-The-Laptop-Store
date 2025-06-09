<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'bookingid';
    protected $fillable = ['laptopid', 'customerid', 'bookingdate', 'quantity', 'totalamount', 'status'];
    use HasFactory;
    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'laptopid', 'laptopid');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid', 'customerid');
    }

}
