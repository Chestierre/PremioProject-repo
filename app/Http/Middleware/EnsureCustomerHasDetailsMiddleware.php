<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;


class EnsureCustomerHasDetailsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd(!$request->user()->customer()->exists());
        //dd($request->user()->customer());
        //dd($request->user()->customer()->exists());
        if ( !$request->user()->customer()->exists()) {
            //dd('hahaha');

            // $user = $request->user();
            //return redirect()->route('customer.CustomerRequestDetails'); //fail attemp hahahaha
            return redirect()->route('customer.FillOutform');
            //return 'aaa';
        }
        else {
            //$query = $request->user()->id;
            
            
            // $data = DB::table('users')
            //     ->select('id', 'username')
            //     ->where('id', 'like', $query)
            //     ->get();
            // dd($data);
            //dd('bababa');
            
            
            //dd(User::with('customer')->find($query));
            
            return $next($request);    
        }
        
    }
}
