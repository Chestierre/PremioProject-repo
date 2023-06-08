<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Collector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('customer.order','customer.preorder')->whereNot('userrole', 'Applicant')->get();
        return view('admin.user.index', compact('user'));
    }
   public function create()
    {

    }
    public function store(Request $request)
    {
        $this->authorize('superadmin', User::class);

        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'userrole' => 'required|string|max:20'
        ]);
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'userrole' => $request->userrole,
        ]);
        
        if ($request->userrole == "Collector"){
            Collector::create([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.user.index'); 

    }

    public function adminstore(Request $request){
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
        if ($request->userrole == "Collector"){
            Collector::create([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.user.index'); 
    }

    public function show(User $user)
    {
        dd("show");
    }
    public function edit(User $user)
    {
        //dd($user);
        $this->authorize('edit', $user);

        return view('admin.user.edit', compact('user')); 
    }
    public function update(Request $request, User $user)
    {   

        $validator = \Validator::make($request->all(), [
            'editusername' => ['required', 'string', 'max:255', 'min:5', Rule::unique('users','username')->ignore($user->id)],
            'editpassword' => 'string|min:5|nullable',
            'userrole' => 'required|string|max:20',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }

        if ($request->editpassword == ""){
            $user -> update([
                'username' => $request->editusername,
                'userrole' => $request->userrole,
            ]);
        }else{
            $user -> update([
                'username' => $request->editusername,
                'userrole' => $request->userrole,
                'password' => Hash::make($request->editpassword),
            ]);
        }

        return response()->json($request);

        // return redirect()->route('admin.user.index');
    }
    public function destroy(User $user)
    {
        // dd("hello");
        $user->load('customer.spouse', 'customer.comaker');
        $this->authorize('edit', $user);
        if($user->customer()->exists()){
            if($user->customer->ApplicantSketch){
                if(Storage::disk('public')->exists($user->customer->ApplicantSketch )){
                    Storage::disk('public')->delete($user->customer->ApplicantSketch);
                }else{
                    dd("storage not working");
                }
            }
            if($user->customer->ApplicantSignature){
                if(Storage::disk('public')->exists($user->customer->ApplicantSignature )){
                    Storage::disk('public')->delete($user->customer->ApplicantSignature);
                }else{
                    dd("storage not working");
                }
            }
            if($user->customer->spouse->SpouseSignature){
                if(Storage::disk('public')->exists($user->customer->spouse->SpouseSignature )){
                    Storage::disk('public')->delete($user->customer->spouse->SpouseSignature);
                }else{
                    dd("storage not working");
                }
            }
            if($user->customer->comaker->Sketch){
                if(Storage::disk('public')->exists($user->customer->comaker->Sketch )){
                    Storage::disk('public')->delete($user->customer->comaker->Sketch);
                }else{
                    dd("storage not working");
                }
            }
            if($user->customer->comaker->Signature){
                if(Storage::disk('public')->exists($user->customer->comaker->Signature )){
                    Storage::disk('public')->delete($user->customer->comaker->Signature);
                }else{
                    dd("storage not working");
                }
            }
            
        };
        
        $user->load('customer');
        // dd($user->customer);

        $user->delete();
        return redirect()->route('admin.user.index');        
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $user_ids = explode(",",$ids);
        foreach ($user_ids as $user_id){
            $user = User::with('customer.spouse', 'customer.comaker')->find($user_id);
            if($user->customer()->exists()){
                if($user->customer->ApplicantSketch){
                    if(Storage::disk('public')->exists($user->customer->ApplicantSketch )){
                        Storage::disk('public')->delete($user->customer->ApplicantSketch);
                    }else{
                        dd("storage not working");
                    }
                }
                if($user->customer->ApplicantSignature){
                    if(Storage::disk('public')->exists($user->customer->ApplicantSignature )){
                        Storage::disk('public')->delete($user->customer->ApplicantSignature);
                    }else{
                        dd("storage not working");
                    }
                }
                if($user->customer->spouse->SpouseSignature){
                    if(Storage::disk('public')->exists($user->customer->spouse->SpouseSignature )){
                        Storage::disk('public')->delete($user->customer->spouse->SpouseSignature);
                    }else{
                        dd("storage not working");
                    }
                }
                if($user->customer->comaker->Sketch){
                    if(Storage::disk('public')->exists($user->customer->comaker->Sketch )){
                        Storage::disk('public')->delete($user->customer->comaker->Sketch);
                    }else{
                        dd("storage not working");
                    }
                }
                if($user->customer->comaker->Signature){
                    if(Storage::disk('public')->exists($user->customer->comaker->Signature )){
                        Storage::disk('public')->delete($user->customer->comaker->Signature);
                    }else{
                        dd("storage not working");
                    }
                }
                
            };

        }


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

    public function getuser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function getcustomeruserrelation($id){
        $user = User::with('customer')->find($id);
        if ($user->customer()->exists()){
            // return response()->json(['errors'=>$validator->errors()]);
            // return response()->json($user);
            return response()->json(['firstname' => $user->customer->FirstName, 'lastname'=> $user->customer->LastName]);
        }
        return null;
    }

    public function import(Request $request){
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        return redirect()->back();
    }
  
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.csv');
    }

    public function checkcollector($id){

        $user = User::with('collector.customer')->find($id);
    
        return response()->json($user);
        // return response()->json(['gello' => 'me']);
    }

    public function getcustomer($id)
    {
        //spouse, 'parent', 'address', 'comaker', 'creditreference', 'dependent', 'personalreference'
        $user = User::with('customer.spouse', 'customer.parent', 'customer.address', 'customer.comaker', 'customer.creditreference', 'customer.dependent', 'customer.personalreference')->find($id);
        
        return response()->json($user->customer);
    }

}
