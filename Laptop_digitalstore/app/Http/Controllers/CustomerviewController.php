<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Brand;
use App\Models\Lapmodel;
use App\Models\Laptop;
use Illuminate\Http\Request;

class CustomerviewController extends Controller
{
    public function brandview()
    {
        $brand = brand::all();
        return view('Customer.brandview', compact('brand'));
    }



    public function laptopview($bid)
    {
        $brand = Brand::findOrFail($bid);

        // Fetch all laptop models that belong to this brand
        $lapmodels = Lapmodel::where('brandid', $bid)->get();

        return view('Customer.laptopview', compact('lapmodels', 'brand'));
    }



    public function getlaptop($modelid)
    {

        $Laptops = Laptop::where("modelid", $modelid)->get();
        return response()->json($Laptops);

    }




    public function viewmorelaptop($laptopid)
    {
        $laptops = Laptop::findOrFail($laptopid);
        return view('Customer.viewmorelaptop', compact('laptops'));
    }

    public function booking(Request $request)
    {
        $b = Booking::create(
            [
                'laptopid' => $request->laptopid,
                'customerid' => $request->session()->get('customerid'),
                'bookingdate' => now(),
                'quantity' => $request->qty,
                'totalamount' => $request->total,
                'status' => 'Requested',
            ]
        );
        $bid = $b->bookingid;


        return redirect()->route('payment', ['id' => $bid])->with('success', 'Pay The bill');

    }
    public function myrequest(Request $request)
    {
        $myrequest = Booking::where('customerid', $request->session()->get('customerid'))->where('status', '!=', 'Requested')->get();
        return view('Customer.myrequest',compact('myrequest'));
    }

}
