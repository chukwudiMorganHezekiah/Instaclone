<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use Cache;


class LoginActivity
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

        if(Auth::check()){

            $expireAt=Carbon::now()->addMinutes(7);

            Cache::put('user_is_online'.Auth::user()->id, true, $expireAt);
        }

        return $next($request);
    }
}
