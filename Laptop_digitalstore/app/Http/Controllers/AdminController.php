<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laptop;
use App\Models\Booking;



class AdminController extends Controller
{
    public function AdminHome()
    {
        $data = DB::table('bookings')
        ->join('laptops', 'bookings.laptopid', '=', 'laptops.laptopid')
        ->select('laptops.laptopname as name', DB::raw('count(bookings.laptopid) as booking_count'))
        ->groupBy('laptops.laptopname')
        ->orderBy('booking_count', 'desc')
        ->get();

    return view('Admin.AdminHome', compact('data'));
    }

    public function currentyearreport(Request $request)
{
    // Get the selected year from the request, default to current year if not selected
    $currentYear = $request->input('year', date('Y'));

    // Calculate the total income for the selected year
    $totalIncome = Booking::whereYear('bookingdate', $currentYear) // Filter by the selected year
        ->sum('totalamount'); // Sum up the 'totalamount' column
    
    // Query to get sum of totalamount grouped by month for income (using bookings table)
    $datainc = DB::table('bookings as b')
        ->select(
            DB::raw('MONTH(b.bookingdate) as month'),
            DB::raw('SUM(b.totalamount) as totalamount') // Assuming 'totalamount' is used for both income and expenses
        )
        ->whereYear('b.bookingdate', $currentYear)
        ->groupBy(DB::raw('MONTH(b.bookingdate)'))
        ->pluck('totalamount', 'month');
    
    $monthlyDatainc = collect(range(1, 12))->map(function ($month) use ($datainc) {
        return [
            'month' => $month,
            'month_name' => \Carbon\Carbon::createFromFormat('m', $month)->format('F'),
            'totalamount' => $datainc->get($month, 0),
        ];
    });

    // Return the data to the view
    return view('Admin.currentyearreport', compact('monthlyDatainc', 'totalIncome', 'currentYear'));
}

public function viewmore($month)
    {
        $monthno=$month;
        $month_name =\Carbon\Carbon::createFromFormat('m', $monthno)->format('F');

        $bookings = Booking::whereMonth('bookingdate',$monthno)->get();
        return view('Admin.viewmore', compact('bookings','month_name'));
    }



}
