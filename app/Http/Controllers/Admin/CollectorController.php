<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectorController extends Controller
{
    public function index()
    {
        $user = User::with('order')->get();
        return view('admin.collector.index',compact('user'));
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

}
