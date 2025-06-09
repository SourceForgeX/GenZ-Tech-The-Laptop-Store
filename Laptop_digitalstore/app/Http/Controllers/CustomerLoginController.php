<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    public function customerlogin()
    {
        return view('Guest.CustomerLogin');
    }


    public function customerlogin_process(Request $request)
    {
        $username = $request->post("uname");
        $password = $request->post("password");
        $check = Customer::where(["username" => $username, "password" => $password])->get();
        if (count($check) == 1) {
            $request->session()->put("username", $username);
            $request->session()->put("customerid", $check[0]['customerid']);
            return redirect()->route('customerhome');

        } else {
            return redirect()->route('customerlogin')->with('failed', 'Invalid Username/Password');
        }

    }



}
