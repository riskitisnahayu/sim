<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            if(auth()->user()->type=='Admin'){
                return redirect('/admin/dashboard');
            }elseif (auth()->user()->type=='Orang tua') {
                return redirect('/orangtua/dashboard');
            }elseif (auth()->user()->type=='Siswa'){
                return redirect('/siswa');
            }
        }
        return $next($request);
    }
}
