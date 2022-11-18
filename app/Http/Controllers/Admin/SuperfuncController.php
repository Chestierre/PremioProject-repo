<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperfuncController extends Controller
{
    public function index()
    {
        $companydetail = CompanyDetail::find(1);
        return view('admin.superfunc.index', compact('companydetail'));
    }

    public function aboutusedit(request $request){
        $request->validate([
            "introduction" => "string|nullable",
            "vision" => "string|nullable",
            "corevalues" => "string|nullable",
            "history" => "string|nullable",
            "mission" => "string|nullable"
        ]);

        $companydetail = CompanyDetail::find(1);

        $companydetail->update([
            "introduction" => $request->introduction,
            "vision" => $request->vision,
            "corevalues" => $request->corevalues,
            "history" => $request->history,
            "mission" => $request->mission
        ]);
        return back()->with('about_us_saved', 'About Us Configuration Changed!');
    }
}
