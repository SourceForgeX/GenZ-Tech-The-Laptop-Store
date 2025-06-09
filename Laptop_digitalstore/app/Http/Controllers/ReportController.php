<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Laptop;
use App\Models\Payment;
class ReportController extends Controller
{
    public function laptopbookingcountreport()
    {
        // Get booking count for each product
        $data = DB::table('bookings')
            ->join('laptops', 'bookings.laptopid', '=', 'laptops.laptopid')
            ->select('laptops.laptopname as name', DB::raw('count(bookings.laptopid) as booking_count'))
            ->groupBy('laptops.laptopname')
            ->orderBy('booking_count', 'desc')
            ->get();

        return view('Admin.piereport', compact('data'));
    }


























    public function datewiselaptopbookingreport(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $laptops = Booking::whereBetween('bookingdate', [$from_date, $to_date])
            ->where('status', 'Delivered') // Add status filter
            ->with('laptop') // Eager load the related product
            ->get();

        return view('Admin.datewisereport', compact('laptops', 'from_date', 'to_date'));
    }

    public function paymentreport(Request $request)
    {

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');


        $laptops = Payment::whereBetween('paymentdate', [$from_date, $to_date])
        ->with('booking') 
            ->get();


        return view('Admin.paymentreport', compact('laptops', 'from_date', 'to_date'));
    }

}
