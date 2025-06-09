<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function GuestHome()
    {
        $brand = Brand::all();
        return view('Guest.GuestHome', compact('brand'));
    }
   

}
