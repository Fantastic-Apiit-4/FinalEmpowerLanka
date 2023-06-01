<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->isban)
        {
            $banned = Auth::user()->isban == '1';
            Auth::logout();

            if($banned == 1){
                $message = "Your account has been banned.";
            }
            return redirect()->route('login')
            ->with('status', $message)
            ->withErrors(['email' => "your account has been banned"]);
        }

        return $next($request);
    }
}
