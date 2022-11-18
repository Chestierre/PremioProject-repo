<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class WelcomeAuthMiddleware
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

        //dd($request->all());
        if (Auth::check()){
            if(((auth()->user()->userrole == "Super Admin") || auth()->user()->userrole == "Admin")){
                return redirect()->route('admin.user.index');
            }
            if(auth()->user()->userrole == "Collector"){
                return redirect()->route('collector.inspector.index');
            }
            if(auth()->user()->userrole == "Customer" && !(auth()->user()->customer()->exists()) ){
                Auth::logout();
            }
        }
        return $next($request);
    }
}
