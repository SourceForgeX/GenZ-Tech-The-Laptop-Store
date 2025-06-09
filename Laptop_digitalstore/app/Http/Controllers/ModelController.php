<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Lapmodel;
use App\Rules\capitalcase;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function model_insert(Request $request)
    {
        $request->validate([
            'model' => ['required', 'string', 'max:255', 'unique:lapmodels,modelname', new capitalcase()],
            // 'brandname'=>new capitalcase(),
            'ddlbrand' => 'required',
        ]);

        $model = $request->model;

        $ddlbrand = $request->ddlbrand;
        $check = Lapmodel::where(["modelname" => $model, "brandid" => $ddlbrand])->get();
        if (count($check) == 0) {
            Lapmodel::create([

                'modelname' => $request->model,
                'brandid' => $request->ddlbrand,

            ]);
            return back()->with('success', 'Model added Successfully');
        } else {
            return redirect()->route('model')->with('failed', 'Already exist');
        }
    }
    public function model()
    {
        $brands = Brand::all();
        return view('Admin.model', compact('brands'));
    }



    public function viewmodel()
    {
        $brands = Brand::all();
        $lapmodels = Lapmodel::all();
        return view('Admin.viewmodel', compact('lapmodels', 'brands'));
    }


    public function getmodel($ddlbrand)
    {
        $lapmodels = Lapmodel::where('brandid', $ddlbrand)->get();
        return response()->json($lapmodels);

    }

    public function editmodel($modelid)
    {
        $lapmodels = Lapmodel::findOrFail($modelid);
        return view('Admin.editmodel', compact('lapmodels'));
    }


    public function update_model(Request $request, Lapmodel $modelid)
    {
        $modelid->update([
            'modelname' => $request->modelname,


        ]);
        return redirect()->route('viewmodel')->with('success', 'model updated successfully');
    }
    public function deletemodel($modelid)
    {
        $Lapmodel = Lapmodel::find($modelid);
        $Lapmodel->delete();
        return redirect()->route('viewmodel')->with('success', 'model Deleted successfully');
    }

}
