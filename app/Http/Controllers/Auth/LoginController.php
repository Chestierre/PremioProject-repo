<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (auth()->user()->userrole == 'Super Admin' || auth()->user()->userrole == 'Admin') {
             return route('admin.user.index');
        }
        if (auth()->user()->userrole == 'Collector') {
            return '/home'; 
        }
        //dd(auth()->user()->customer == null);
        //if (auth()->user()->customer == null){
        //    return route('customer.CustomerRequestDetails');
        // }
        return  route('customer.customer.index');
        
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
}
