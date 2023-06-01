<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Auth\Guard;

class ForbidBannedUserCustom
{

    protected $auth;

    public function _construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $item = $this->auth->user();
        if($item && $item->isBanned()){
            \Session::flush();

            return redirect('login')->withInput()->withErrors([
                'email' => 'This account is Blocked',
            ]);
        }
        return $next($request);
    }
}
