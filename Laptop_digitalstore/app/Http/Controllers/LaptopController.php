<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use App\Models\Lapmodel;
use App\Models\Laptop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Rules\capitalcase;
class LaptopController extends Controller
{
    public function Laptop()
    {
        $brands = Brand::all();
        $models = Lapmodel::all();
        return view('Admin.Laptop', compact('brands', 'models'));
    }

    public function laptop_insert(Request $request)
    {



        $request->validate([
            'laptopname' => new CapitalCase(),

            'price' => 'required|string|max:255',
            'screensize' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'harddisk' => 'required|string|max:255',
            'ddlmodel' => 'required|exists:lapmodels,modelid',
            'ddlbrand' => 'required|exists:brands,brandid',

            'processor' => 'required|string|max:255',

            'cpumodel' => 'required|string|max:255',
            'rammemory' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'graphics' => 'required|string|max:255',
            'warranty' => 'required|string|max:255',
           'stock' => 'required|integer|min:0|max:99',

            'features' => 'required|string|max:255',





        ]);
        $laptopname = $request->laptopname;

        $ddlmodel = $request->ddlmodel;
        $check = Laptop::where(["laptopname" => $laptopname, "modelid" => $ddlmodel])->get();
        if (count($check) == 0) {

            if ($request->hasFile('limage')) {
                $limage = $request->file('limage');
                $filename = $limage->getClientOriginalName();
                $destinationPath = public_path('/upload');
                $limage->move($destinationPath, $filename);
            }

            if ($request->hasFile('limage1')) {
                $limage1 = $request->file('limage1');
                $filename1 = $limage1->getClientOriginalName();
                $destinationPath = public_path('/upload');
                $limage1->move($destinationPath, $filename1);
            }


            Laptop::create(
                [
                    'laptopname' => $request->laptopname,
                    'modelid' => $request->ddlmodel,
                    'image1' => $filename,
                    'image2' => $filename1,
                    'price' => $request->price,
                    'screensize' => $request->screensize,
                    'color' => $request->color,
                    'harddisk' => $request->harddisk,
                    'processor' => $request->processor,
                    'cpumodel' => $request->cpumodel,
                    'ram' => $request->rammemory,
                    'os' => $request->os,
                    'graphics' => $request->graphics,
                    'stock' => $request->stock,
                    'warranty' => $request->warranty,
                    'features' => $request->features,


                ]
            );
            return back()->with('success', 'Laptop Added Successfully');
        } else {
            return redirect()->route('Laptop')->with('failed', 'Already exist');
        }
    }

    public function viewlaptop()
    {
        $brands = Brand::all();
        $lapmodels = Lapmodel::all();
        return view('Admin.viewlaptop', compact('brands', 'lapmodels'));

    }
    public function getlaptop($ddlmodel)
    {

        $Laptops = Laptop::where("modelid", $ddlmodel)->get();
        return response()->json($Laptops);

    }
    public function editlaptop($laptops)
    {
        $Laptops = Laptop::findOrFail($laptops);
        return view('Admin.editlaptop', compact('Laptops'));
    }





    public function update_laptop(Request $request, Laptop $laptopid)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $filename);
        } else {
            $filename = $request->oldimage;
        }


        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename2 = $image1->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $image1->move($destinationPath, $filename2);
        } else {
            $filename2 = $request->oldimage1;
        }




        $laptopid->update([
            'laptopname' => $request->laptopname,
            'screensize' => $request->screensize,
            'color' => $request->color,
            'harddisk' => $request->harddisk,
            'price' => $request->price,
            'processor' => $request->processor,
            'cpumodel' => $request->cpumodel,
            'ram' => $request->ram,
            'os' => $request->os,
            'graphics' => $request->graphics,
            'warranty' => $request->warranty,
            'features' => $request->features,
            'image1' => $filename,
            'image2' => $filename2,

        ]);
        return redirect()->route('viewlaptop')->with('success', 'updated successfully');
    }
    public function deletelaptop($laptopid)
    {
        $laptop = Laptop::find($laptopid);
        $laptop->delete();
        return redirect()->route('viewlaptop')->with('success', 'Deleted successfully');
    }


    public function addstock($laptops)
    {
        $Laptops = Laptop::findOrFail($laptops);
        return view('Admin.addstock', compact('Laptops'));
    }


    public function update_stock(Request $request, Laptop $laptopid)
    {

        $laptopid->update([

            'stock' => $request->stock,

        ]);
        return redirect()->route('viewlaptop')->with('success', 'updated successfully');

    }





}
