<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $customers = Customer::all()->sortByDesc('IsSubscriber');
        return view('admin.subscriber.index', compact('customers'));
    }
    public function subscribe(request $request)
    {   
        $customer = Customer::find($request->item);
        if($request->state == "Enable"){
            $customer->update([
                'IsSubscriber' => '1'
            ]);
        }else if ($request->state == "Disable"){
            $customer->update([
                'IsSubscriber' => '0'
            ]);
        }
        return response()->json($request->all());
    }
}
