<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class is_service_provider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role_id === 2){
            return $next($request);
        } 
        
        if($request->expectsJson()){
            return response()->json("You are not an service provider");
        } else {
            return redirect()->to(route('users.login'));
        }
    }
}
