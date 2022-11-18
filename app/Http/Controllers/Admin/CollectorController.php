<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Collector;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectorController extends Controller
{
    public function index()
    {
        // $user = User::with('order')->get();
        $collectors = Collector::with('user','customer')->get();
        return view('admin.collector.index', compact('collectors'));
    }
    public function edit($user1){
        //  dd($user1);
        $user = User::find($user1);
        return view('admin.collector.edit', compact('user'));
    }
    public function orderEdit($id){
        $order = Order::find($id);
        return view('admin.collector.orderEdit', compact('order'));
    }
    public function show(User $user)
    {
    }
    public function unassignOrder($userid,$orderid){
        // dd($userid);
        // dd($orderid);
        //$user = User::find($userid);
        //dd($user->order);
        $order = Order::find($orderid);

        $order -> update([
            'user_id' => NULL
        ]);
        return redirect()->route('admin.collector.index'); 
    }

    public function getcustomercollectorrelation($id){
        // $collector = Collector::with('user')->find($id);
        $customer = Customer::with('user.collector')->get();
        $collector = Collector::with('user')->get();
        // $customer = Customer::all();


        return response()->json(array($customer, $collector));
        // return response()->json(['gello' => 'me']);
    }

    public function assigncustomer(Request $request, $id){
        $customer = Customer::find($request->customer_id);

        if($request->state == 0){
            $customer -> update([
                'collector_id' => $id 
            ]);
        }else{
            $customer -> update([
                'collector_id' => NULL 
            ]);
        }

        return response()->json($customer->collector_id);
    }

    public function getallcustomerfromcollector($id){
        $customer = Customer::with('user.collector')->where('collector_id', '=', $id)->get();
        // $customer = Customer::where('collector_id', '=', $id)->get();

        return response()->json($customer);
    }

    public function findcollector($id){
        $collector = Collector::with('user')->find($id);
        
        return response()->json($collector);
    }

    public function ajaxindex(){
         $collector = Collector::with('user','customer')->get();
        // $collector = Collector::all();
        return response()->json($collector);
    }

}
