<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('admin.brand.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'brandname' => 'required|string|unique:brands',
            'sixMonthrate' => 'required|numeric',
            'twelveMonthrate' => 'required|numeric',
            'eighteenMonthrate' => 'required|numeric',
            'twentyfourMonthrate' => 'required|numeric',
            'thirthyMonthrate' => 'required|numeric',
            'thirtysixMonthrate' => 'required|numeric'
        ]);

        Brand::create([
            'brandname' => $request->brandname,
            'sixMonthRate' => $request->sixMonthrate,
            'twelveMonthRate' => $request->twelveMonthrate,
            'eigthteenMonthRate' => $request->eighteenMonthrate,
            'twentyfourMonthRate' => $request->twentyfourMonthrate,
            'thirtyMonthRate' => $request->thirthyMonthrate,
            'thirtysixMonthRate' => $request->thirtysixMonthrate

        ]);

        return redirect()->route('admin.unit.index');
    }
    public function show(brand $brand)
    {
        dd('hello');
    }
    public function edit(brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));   
    }
    public function update(Request $request, brand $brand)
    {
        $request->validate([
            'brandname' => ['required', 'string', Rule::unique('brands')->ignore($brand->id),],
            'sixMonthrate' => 'required|numeric',
            'twelveMonthrate' => 'required|numeric',
            'eighteenMonthrate' => 'required|numeric',
            'twentyfourMonthrate' => 'required|numeric',
            'thirthyMonthrate' => 'required|numeric',
            'thirtysixMonthrate' => 'required|numeric'
        ]);
        
        $brand-> update ([
            'brandname' => $request->brandname,
            'sixMonthRate' => $request->sixMonthrate,
            'twelveMonthRate' => $request->twelveMonthrate,
            'eigthteenMonthRate' => $request->eighteenMonthrate,
            'twentyfourMonthRate' => $request->twentyfourMonthrate,
            'thirtyMonthRate' => $request->thirthyMonthrate,
            'thirtysixMonthRate' => $request->thirtysixMonthrate
        ]);
        return redirect()->route('admin.unit.index');
    }
    
    public function destroy(Brand $brand)
    {   
        // dd('hello1');
        $brand->delete();
        return redirect()->route('admin.unit.index');
    }

    public function try(Request $request){
        $query = addslashes(request('brandname'));
        $brands = DB::table('brands')           
            // ->select('brandname', request('brandname'))
            ->select('id', 'brandname')
            -> where('brandname', 'like', $query)
            // ->select('id', 'brandname')
            // ->find(request('brandname'));
            ->get();
            //dd($me);
            //dd($query);
        //dd(request('brandname'));
        //dd($brands[0]->id);
        $object = Brand::findorfail($brands[0]->id);
        //dd($object->unit());
        //$temp = Brand::has('unit')->get();
        //dd($object->unit()->exist());
        //dd($object->unit()->get()->isEmpty());
        if ($object->unit()->get()->isEmpty()){
            $object->delete();
            return redirect()->route('admin.unit.index');  
        }
        else{
            $unit = $object->unit()->get();
            return view('admin.brand.deletewarn', compact('unit','object')); 
        }

        //dd($object->units_count);
        
    }
}
