<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customerid';
    protected $fillable = ['customername', 'landmark', 'locationid', 'pincode', 'phone', 'email', 'regdate', 'username', 'password'];
    use HasFactory;
    public function location()
    {
        return $this->belongsTo(Location::class, 'locationid', 'locationid');
    }


}
