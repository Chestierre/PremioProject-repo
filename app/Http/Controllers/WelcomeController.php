<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Promo;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::orWhereNotNull('brand_id')->paginate(8);
        $brand = Brand::all();
        $promo = Promo::with('unit.unitimage', 'unit.brand')->where('PromoActive', 1)->get();
        
        return view('welcome', compact('unit', 'brand', 'promo'));
    }
    
    public function aboutus()
    {
        $brand = Brand::all();
        $companydetail = CompanyDetail::find(1);       
        return view('about-us', compact('brand','companydetail'));
    }
    public function getunit($id){
        $unit = Unit::with('unitimage', 'brand')->orWhereNotNull('brand_id')->find($id);
        return response()->json($unit);

    }
    public function getpromo($id){
        $promo = Promo::with('unit.unitimage', 'unit.brand')->where('PromoActive', 1)->find($id);
        return response()->json($promo);

    }
    public function searchItem(request $request){
        $searchterm = $request->search;

        if(Brand::where('brandname', $searchterm)->count() > 0){
            $units = Unit::with('brand')->whereHas('brand', function(Builder $query) use ($searchterm){
                $query->where('brandname', $searchterm);
            })->paginate(5);
            $count = Unit::with('brand')->whereHas('brand', function(Builder $query) use ($searchterm){
                $query->where('brandname', $searchterm);
            })->get()->count();
            
            $brand = Brand::all();
            return view('searchPage', compact('brand', 'units'), ['SearchTerm' => $searchterm." {Brand}", 'count' => $count]);
            // dd($units);
        }else{
            // dd($request->all());
            // dd($searchterm);
            $units = Unit::with('brand')->where('modelname','LIKE', "%{$searchterm}%")->paginate(5);
            $brand = Brand::all();
            return view('searchPage', compact('brand', 'units'), ['SearchTerm' => $searchterm]);
        }



    }

}
