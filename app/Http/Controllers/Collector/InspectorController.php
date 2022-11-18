<?php

namespace App\Http\Controllers\Collector;

// use App\User;
use App\Models\User;
use App\Models\Order;
use App\Models\Collector;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspectorController extends Controller
{
    public function index()
    {   
        $user = User::with('collector')->find(auth()->user()->id);
        $collector = Collector::with('customer.order')->find($user->collector->id);
        
        return view('collector.index', compact('collector'));
    }
    public function create()
    {
    
    }
    public function store(Request $request)
    {
     
    }
    public function show($id)
    {
        $order = Order::with('orderhistory','ordertransactiondetails', 'ordercustomerinformation')->find($id);
        return view('collector.history', compact('order'));
    }
    public function edit($id)
    {
        $customer = Customer::with('order.ordertransactiondetails', 'order.orderhistory')->find($id);
        return view('collector.order', compact('customer'));
    }
    public function update(Request $request, $id)
    {
     
    }
    public function destroy($id)
    {
     
    }

    public function getorder($id)
    {
        $order = Order::with('ordertransactiondetails')->find($id);
        return response()->json($order);
    }
}
