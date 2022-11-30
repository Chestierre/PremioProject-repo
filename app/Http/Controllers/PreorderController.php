<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Preorder;

class PreorderController extends Controller
{
    public function buyproduct($id){
        if (auth()->check()) {
            if(auth()->user()->userrole == "Customer"){
                Preorder::create([
                    'customer_id' => auth()->user()->customer->id,
                    'unit_id' => $id,
                ]);

                return back()->with('preorder_save', 'your message has been sent successfully!');
            }
            // dd(auth()->user()->customer->id );
        }else{
            dd("auth not");
        }
    }
}
