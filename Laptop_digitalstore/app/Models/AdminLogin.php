<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    protected $table = 'adminlogins';
      protected  $primaryKey='Loginid';
    protected $fillable=['username','password'];
    
    use HasFactory;
}
