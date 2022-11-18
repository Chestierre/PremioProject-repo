<?php

namespace App\Http\Controllers\Auth;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected function redirectTo()
    {
        
        if (auth()->user()->userrole == 'Super Admin' || auth()->user()->userrole == 'Admin') {
             return route('admin.user.index');
        }
        if (auth()->user()->userrole == 'Collector') {
            return route('collector.inspector.index'); 
        }
        // $brand = Brand::all();
        // $customer = Customer::with('user')->get();
        // //dd(auth()->user()->customer == null);
        // if (auth()->user()->customer == null){
        //     return route('customer.CustomerRequestDetails');
        // }
        return  route('customer.customer.index');
        // return view('/home', compact('customer','brand'));
        //return '/'; 
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
  {
      $brand = Brand::all();
      return view('auth/login', compact('brand'));
  }
}
