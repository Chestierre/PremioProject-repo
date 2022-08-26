<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Unitimage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        $brand = Brand::all();
        return view('admin.unit.index', compact('unit','brand'));
    }
    public function create()
    {
        $brand = Brand::all();
        return view('admin.unit.create', compact('brand')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'brandName' => 'required|integer',
            'modelName' => 'required|string|unique:units',
            'modelcaption' => 'required|string',
            'modeldescription' => '',
            'price' => 'required|integer',
            'modeldownpayment' => 'required|integer',
            'modelDiscount' => 'integer|nullable',
            'image' => 'required|image',
            'ImageVariation' => 'required'

        ]);       
        // $query = $request->brandName;
        // $brands = DB::table('brands')
        //         ->select('id', 'brandname')
        //         ->where('brandname', 'like', $query)
        //         ->get();

        $unit = Unit::create([
            
            'modelname' => $request->modelName,
            'modeldescription' => $request->modeldescription,
            'price' =>  $request -> price,
            'brand_id' => $request -> brandName,
            'modelcaption' => $request -> modelcaption,
            'modeldownpayment' => $request -> modeldownpayment,
            'modelDiscount' => $request -> modelDiscount
        ]);

        $imagePaths = request('image')->store('uploads', 'public');

        Unitimage::create([
            'unit_id' => $unit->id,
            'image' => $imagePaths,
            'ImageVariation' => $request->ImageVariation,
        ]);
        //dd($unit);
        // create Unit Image create

        //
        return redirect()->route('admin.unit.index');
        // dd($request->all());
    }

    public function show(Unit $unit)
    {
    }
    public function edit(Unit $unit)
    {
        $brand = Brand::all();
        return view('admin.unit.edit', compact('unit','brand'));
    }
    public function update(Request $request, Unit $unit)
    {
        // dd($request->all());
        $request->validate([
            'brandName' => 'required|integer',
            'modelName' => ['required', 'string', Rule::unique('units')->ignore($unit->id),],
            'modeldescription' => '',
            'price' => 'required|integer',
        ]);
        
        $unit-> update ([
            'modelname' => $request->modelName,
            'modeldescription' => $request->modeldescription,
            'price' =>  $request -> price,
            'brand_id' => $request -> brandName
        ]);
        return redirect()->route('admin.unit.index');
    }
    public function destroy(Unit $unit)
    {
        
        // $image_path = storage_path().'/app/public/'.$unit->unitimage[0]->image;
        // unlink($image_path);
        // dd('gello');
        // dd($unit->unitimage[0]);
        foreach ($unit->unitimage as $unit->unitimage) {
            Storage::delete('$unit->unitimage->image');
            $unit->unitimage->delete();
        }
        
        $unit->delete();
        return redirect()->route('admin.unit.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("units")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Users Deleted successfully."]);
    }

    public function search(Request $request){
        $brand = Brand::all();        
        if ($request->brand_type == 'All'){
            $unit = Unit::query()
                ->where('modelname', 'LIKE', "%{$request->search_name}%")
                ->get();
            return view('admin.unit.index', compact('unit','brand'));
        }
        else{
            // $unit = Unit::query()
            //     ->where('modelname', 'LIKE', "%{$request->search_name}%")
            //     ->where('brand_type', 'LIKE', "%{$request->unit_type}%")
            // //     ->get();
            // $unit = Unit::whereHas('brand', function (Builder $query) {
            //     $query->where('brandname', 'like', '%{$request->brand_type}%')
            //     ->where('modelname', 'LIKE', "%{$request->search_name}%");
            //     })->get();

            // $unitall = Unit::query()
            //     ->where('modelname', 'LIKE', "%{$request->search_name}%")
            //     ->get();
            // $unit = $unitall->brand()->where('brandname', 'like', '%{$request->brand_type}%')->get();
            $brandtemp = Brand::query()
                    ->where('brandname', 'LIKE', "%{$request->brand_type}%")
                    ->get();
            $brandid = ($brandtemp[0]->id);
            //dd($brandtemp[0]->id);
            $unit = Unit::query()
                ->where('modelname', 'LIKE', "%{$request->search_name}%")
                ->where('brand_id', 'LIKE', "$brandid")
                ->get();
            return view('admin.unit.index', compact('unit','brand'));
        }
        
    }
    public function variationStore(Request $request, Unit $unit){
        $request->validate([
            'image' => 'required|image',
            'caption' => 'required'
        ]);
        $imagePaths = request('image')->store('uploads', 'public');    
        // dd($unit);
        Unitimage::create([
            'unit_id' => $unit->id,
            'image' => $imagePaths,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.unit.edit', $unit);
    }
}
