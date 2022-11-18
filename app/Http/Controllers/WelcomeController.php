<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Promo;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

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
        $unit = Unit::all();
        $brand = Brand::all();
        $promo = Promo::all();
        return view('welcome', compact('unit', 'brand', 'promo'));
    }
    
    public function aboutus()
    {
        $brand = Brand::all();
        $companydetail = CompanyDetail::find(1);       
        return view('about-us', compact('brand','companydetail'));
    }


}
