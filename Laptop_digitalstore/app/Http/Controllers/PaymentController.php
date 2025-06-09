<?php

namespace App\Http\Controllers;

use App\Mail\confirm;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Log;
use Mail;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $bookingid = Booking::find($id);
        return view('Customer.payment', compact('bookingid'));
    }


    public function payment_insert(Request $request)
    {
        $bid = $request->bookingid;
        Payment::create([
            'bookingid' => $request->bookingid,
            'paymentdate' => now(),

            'housename' => $request->address,
            'pstatus' => 'Paid',

        ]);
        $data = Booking::find($bid);
        $data->update([
            'status' => 'Paid'
        ]);
        return redirect()->route('customerhome')->with('success', 'Payment successfull');
    }


    public function paymentview()
    {
        $datas = Payment::where('pstatus', 'Paid')->get();

        return view('Admin.paymentview', compact('datas'));
    }

    public function viewmoredetails($paymentid)
    {
        $payments = Payment::findOrFail($paymentid);
        return view('Admin.viewmoredetails', compact('payments'));
    }

    public function delivered($bookingid)
    {


        $data = Booking::find($bookingid);
        $data->update([
            'status' => 'Delivered',
        ]);

        $p = Payment::where('bookingid', $bookingid)->first();
        $p->update([
            'pstatus' => 'Delivered',

        ]);

        return redirect()->route('paymentview')->with('success', 'Delivered Successfully');

    }




    public function confirm($bookingid)
    {
            $booking = Booking::with('customer')->findOrFail($bookingid); // Ensure booking exists

            // Update booking status to 'Confirmed'
            $booking->update(['status' => 'Confirmed']);

            // Send confirmation email
            if (isset($booking->customer->email)) {
                Mail::to($booking->customer->email)->send(new confirm($booking));
            }

            return back()->with('success', 'Order confirmed. The laptop will be delivered within 5 days.');
     
    }



}
