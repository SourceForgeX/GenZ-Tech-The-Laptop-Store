<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Location;

use Illuminate\Http\Request;
use App\Rules\capitalcase;

class LocationController extends Controller
{
    public function location()
    {
        $districts = District::all();
        return view('Admin.Location', compact('districts'));
    }
    public function location_insert(Request $request)
    {

        $request->validate([
            'location' => ['required', 'string', 'max:255', 'unique:locations,locationname', new capitalcase()],
            'district' => 'required|exists:districts,districtid',


        ]);

        $location = $request->location;

        $district = $request->district;
        $check = Location::where(["locationname" => $location, "districtid" => $district])->get();
        if (count($check) == 0) {

            Location::create([

                'locationname' => $request->location,
                'districtid' => $request->district,
            ]);
            return back()->with('success', 'Location added Successfully');
        } else {
            return redirect()->route('Location')->with('failed', 'Already exist');
        }
    }
    public function viewlocation()
    {
        $districts = District::all();
        $locations = location::all();
        return view('Admin.viewlocation', compact('locations', 'districts'));
    }
    public function getlocation($ddldistrict)
    {
        $locations = Location::where('districtid', $ddldistrict)->get();
        return response()->json($locations);

    }

    public function editlocation($locationid)
    {
        $Locations = Location::findOrFail($locationid);
        return view('Admin.editlocation', compact('Locations'));
    }

    public function update_location(Request $request, Location $locationid)
    {
        $locationid->update([
            'locationname' => $request->locationname,


        ]);
        return redirect()->route('viewlocation')->with('success', 'location updated successfully');
    }

    public function deletelocation($locationid)
    {
        $location = Location::find($locationid);
        $location->delete();
        return redirect()->route('viewlocation')->with('success', 'Location Deleted successfully');
    }

}
