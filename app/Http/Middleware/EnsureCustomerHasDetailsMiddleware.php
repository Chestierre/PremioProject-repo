<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


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
        //dd($request->user()->customer()->exists());
        if ( !$request->user()->customer()->exists()) {
            //dd('hahaha');
            return redirect()->route('customer.CustomerRequestDetails'); //fail attemp hahahaha
            //return 'aaa';
        }
        else {
            //dd('bababa');
            return $next($request);    
        }
        
    }
}
