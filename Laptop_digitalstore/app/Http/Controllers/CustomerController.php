<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\customerregistration;
use App\Rules\capitalcase;

class CustomerController extends Controller
{
    public function customerreg()
    {
        $districts = District::all();
        return view('Guest.customerreg', compact('districts'));
    }



    public function getlocation($district)
    {
        $location = Location::where("districtid", $district)->get();
        return response()->json($location);
    }

    public function customer_insert(Request $request)
    {
        $request->validate([
            'Name' =>new CapitalCase(),

            'landmark' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|integer|digits:10',
            'pincode' => 'required|integer|digits:6',
            'ddldistrict' => 'required|exists:districts,districtid',
            'ddllocation' => 'required|exists:locations,locationid',
            'username' => 'required|string|min:5|max:20|unique:customers,username',
            'password' => 'required|string|min:8|confirmed',
        ]);
        try { 
            $customers = Customer::create([

                'customername' => $request->Name,
                'landmark' => $request->landmark,
                'locationid' => $request->ddllocation,
                'pincode' => $request->pincode,
                'phone' => $request->phone,
                'email' => $request->email,
                'regdate' => date('Y-m-d'),
                'username' => $request->username,
                'password' => $request->password,

            ]);




            // return back()->with('success', 'Registration Successfully');  

            Mail::to($request->email)->send(new customerregistration($customers));


            return back()->with('success', 'customer registered successfully and email sent.');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Error while registering manager: ' . $e->getMessage());

            return back()->with('error', 'customer registered but failed to send email.');
        }
    }

}
