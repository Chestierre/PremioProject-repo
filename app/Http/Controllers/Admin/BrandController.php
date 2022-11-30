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

    public function deletebrand(Request $request){
        $brand = Brand::find($request->brand_id);
        $brand->delete();
        return redirect()->route('admin.unit.index');
    }


}
