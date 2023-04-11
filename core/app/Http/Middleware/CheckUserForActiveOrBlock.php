<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserForActiveOrBlock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){

            $user =Auth::user();
            if ($user->user_banned == 1){
                Auth::logout();
                return redirect()->route('homePage')->withErrors('Your account has has been blocked');
            }

            return $next($request);
        }
        return redirect()->route('login');


    }

}
