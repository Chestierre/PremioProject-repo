<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('customer')->get();
        return view('admin.user.index', compact('user'));
    }
   public function create()
    {

    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'userrole' => 'required|string|max:20'
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'userrole' => $request->userrole,
        ]);
        // if ($temp->userrole == 'Customer') {
        //     return redirect()->route('customer.CustomerRequestDetails');
        // }
        // else{
        return redirect()->route('admin.user.index'); 
        // }
    }

    public function show(User $user)
    {
    }
    public function edit(User $user)
    {
        dd($user);
        $this->authorize('edit', $user);

        return view('admin.user.edit', compact('user')); 
    }
    public function update(Request $request, User $user)
    {   
        //dd($request);
        // dd($user);
        $this->authorize('edit', $user);

        $user -> update([
            'username' => $request->username
        ]);

        
        return redirect()->route('admin.user.index');
    }
    public function destroy(User $user)
    {
        // dd("hello");
        $this->authorize('edit', $user);

        
        if ($user->userrole == 'Customer' && !$user->customer == null){
            $user->customer->delete();
        }        
        $user->delete();
        return redirect()->route('admin.user.index');        
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("users")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Users Deleted successfully."]);
    }

    public function password_edit($id)
    {
        $user = User::find($id);
        //$this->authorize('edit', $user);

        return view('admin.user.password_edit', compact('user')); 
    }


    public function password_update(Request $request, User $user)
    {   
        $this->authorize('edit', $user);

        $request->validate([
            'password' => 'required|string|min:5|confirmed'
        ]);


        $user -> update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user.index');
    }

    public function search(Request $request){

        if ($request->user_type == 'All'){
            $user = User::query()
                ->where('username', 'LIKE', "%{$request->search_name}%")
                ->get();
            return view('admin.user.index', compact('user'));
        }
        else{
            $user = User::query()
                ->where('username', 'LIKE', "%{$request->search_name}%")
                ->where('userrole', 'LIKE', "%{$request->user_type}%")
                ->get();
            return view('admin.user.index', compact('user'));
        }
        
    }
}
