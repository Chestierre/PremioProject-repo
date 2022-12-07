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
        
        $unit = Unit::with('order')->orWhereNotNull('brand_id')->get();
        $brand = Brand::with('unit.order')->get();
        // dd($brand->unit);
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
        $unit->load('order');
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
            if($unit->unitimage->image){
                if(Storage::disk('public')->exists($unit->unitimage->image )){
                    Storage::disk('public')->delete($unit->unitimage->image);
                }else{
                    dd("storage not working");
                }
            }
            // Storage::delete('$unit->unitimage->image');
            $unit->unitimage->delete();
        }
        
        $unit->delete();
        return redirect()->route('admin.unit.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $unit_ids = explode(",",$ids);
        foreach ($unit_ids as $unit_id){
            $unit = Unit::with('unitimage')->find($unit_id);
            foreach ($unit->unitimage as $unit->unitimage) {
                if($unit->unitimage->image){
                    if(Storage::disk('public')->exists($unit->unitimage->image )){
                        Storage::disk('public')->delete($unit->unitimage->image);
                    }else{
                        dd("storage not working");
                    }
                }
                // Storage::delete('$unit->unitimage->image');
                $unit->unitimage->delete();
            }
        }
        DB::table("units")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Units Deleted successfully."]);
    }

    public function search(Request $request){
            $brand = Brand::all();
            $brand_id = $request->brand_type;
            $searchterm = $request->search_name;
            // dd($request->all());
            if ($brand_id != 'All'){
                $unit = Unit::where('brand_id', $brand_id)->where('modelname','LIKE', "%{$searchterm}%")->get();
            }else{
                $unit = Unit::where('modelname','LIKE', "%{$searchterm}%")->get();
            }

            return view('admin.unit.index', compact('unit','brand'));
        
        
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
            'ImageVariation' => $request->caption,
        ]);

        return redirect()->route('admin.unit.edit', $unit);
    }

    public function getbrand($id){
        $brand = Brand::with('unit')->find($id);
        return response()->json($brand);

    }


}
