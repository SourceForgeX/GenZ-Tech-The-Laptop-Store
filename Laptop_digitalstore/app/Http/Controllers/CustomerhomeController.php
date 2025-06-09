<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class CustomerhomeController extends Controller
{
    public function customerhome()
    {
        $brand = Brand::all();
        return view('Customer.CustomerHome',compact('brand'));
    }
}
