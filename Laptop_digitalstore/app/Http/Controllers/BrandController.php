<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Rules\capitalcase;

class BrandController extends Controller
{




    public function brand()
    {
        return view('admin.brand');
    }

    public function brand_insert(Request $request)
    {
        $request->validate([
            'brandname' => ['required', 'string', 'max:255', 'unique:brands,brandname', new capitalcase()],
            // 'brandname'=>new capitalcase(),
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = $logo->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $logo->move($destinationPath, $filename);
        }

        Brand::create(
            [
                'brandname' => $request->brandname,
                'logo' => $filename,


            ]
        );
        return back()->with('success', 'Brand Added Successfully');
    }

    public function viewbrand()
    {
        $brands = brand::all();
        return view('Admin.viewbrand', compact('brands'));
    }
    public function editbrand($brandid)
    {
        $brands = brand::findOrFail($brandid);
        return view('Admin.editbrand', compact('brands'));
    }
    public function update_brand(Request $request, Brand $brands)
    {
        if ($request->hasFile('newlogo')) {
            $logo = $request->file('newlogo');
            $filename = $logo->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $logo->move($destinationPath, $filename);
        } else {
            $filename = $request->oldlogo;
        }
        $brands->update([
            'brandname' => $request->brandname,
            'logo' => $filename,

        ]);



        return redirect()->route('viewbrand')->with('success', 'model updated successfully');
    }

    public function deletebrand($brandid)
    {
        $brand = Brand::find($brandid);
        $brand->delete();
        return redirect()->route('viewbrand')->with('success', 'brand Deleted successfully');
    }


}