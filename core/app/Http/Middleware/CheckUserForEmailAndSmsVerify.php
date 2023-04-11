<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserForEmailAndSmsVerify
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

            if ($user->email_verified == 1 && $user->sms_verified == 1) return $next($request);


            return redirect()->route('user.verify')->withErrors( ' Please Verify  your account.');

        }
        return redirect()->route('login');


    }

}
