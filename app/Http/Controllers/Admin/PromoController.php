<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promo;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        $promo = Promo::all();
        return view('admin.promo.index', compact('unit','promo'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    //  dd($request->all());
     $request->validate([
        'unit_id' => 'required|integer',
        'PromoImage' => 'required|image',
        'PromoTitle' => 'required|string',
        'PromoCaption' => 'nullable|string',
        'PromoDescription' => 'nullable|string'
     ]);

     $imagePaths = request('PromoImage')->store('uploads', 'public');

     Promo::create([
        
        'PromoImage' => $imagePaths,
        'PromoTitle' => $request->PromoTitle,
        'PromoDescription' => $request->PromoDescription,
        'PromoCaption' => $request->PromoCaption,
        'PromoActive' => TRUE,

        'unit_id' => $request->unit_id

        
     ]);
     return redirect()->route('admin.promo.index');
    }
    public function show(promo $promo)
    {
     
    }
    public function edit(promo $promo)
    {
        $unit = Unit::all();
        return view('admin.promo.edit', compact('promo','unit'));
    }

    public function update(Request $request, promo $promo)
    {
        $promo -> update([
            'PromoTitle' => $request->PromoTitle,
            'PromoCaption' => $request->PromoCaption,
            'PromoDescription' => $request->PromoDescription,
            'unit_id' => $request->unit_id,
            'PromoActive' => $request->PromoActive,
        ]);
        
        return redirect()->route('admin.promo.index');

    }
    public function destroy(promo $promo)
    {
        if($promo->PromoImage){
            if(Storage::disk('public')->exists($promo->PromoImage )){
                Storage::disk('public')->delete($promo->PromoImage);
            }else{
                dd("storage not working");
            }
        }
        // Storage::delete('$promo->PromoImage');
        $promo->delete();
        return redirect()->route('admin.promo.index'); 
    }
    public function search(Request $request)
    {
        // dd($request->all());
        $unit = Unit::all();
        $promo = Promo::query()
                ->where('PromoTitle', 'LIKE', "%{$request->search_name}%")
                ->get();
        return view('admin.promo.index', compact('promo','unit'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("promos")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Promo Deleted successfully."]);
    }
}
