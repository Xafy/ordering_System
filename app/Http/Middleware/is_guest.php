<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class is_guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()){
            return $next($request);
        } 
        
        if($request->expectsJson()){
            return response()->json("You are not a guest");
        } else {
            if (Auth::user()->role == "is_service_provider"){
                return redirect()->to(route('orders.index'));
            } elseif (Auth::user()->role == "is_admin") {
                return redirect()->to(route('orders.all'));
            } else {
                return response("llllllllllllll");
            }
        }
    }
}
