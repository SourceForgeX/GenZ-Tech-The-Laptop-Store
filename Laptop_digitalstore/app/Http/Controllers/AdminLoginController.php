<?php

namespace App\Http\Controllers;

use App\Models\Adminlogin;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminlogin()
    {
        return view('Guest.AdminLogin');
    }

    public function adminlogin_process(Request $request)
    {
        $username = $request->post("username");
        $password = $request->post("password");
        $check = Adminlogin::where(["username" => $username, "password" => $password])->get();
        if (count($check) == 1) {
            $request->session()->put("username", $username);
            $request->session()->put("Loginid", $check[0]['Loginid']);
            return redirect()->route('AdminHome');

        } else {
            return redirect()->route('adminlogin')->with('failed', 'Invalid Username/Password');
        }

    }


}
