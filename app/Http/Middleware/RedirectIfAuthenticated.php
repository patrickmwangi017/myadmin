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
        switch ($guard) {
            case 'accountants':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('accountants/home');
                }
            break;
            case 'shipmentmanager':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('shipmentmanager/home');
                }
            break;
            case 'ordermanager':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('ordermanager/home');
                }
            break;
            case 'stockmanager':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('stockmanager/home');
                }
            break;
            case 'drivers':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('drivers/home');
                }
            break;
            case 'masons':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('masons/home');
                }
            break;
            case 'admins':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admins/home');
                }
            break;

            default:
            if (Auth::guard($guard)->check()) {
                return redirect()->route('product.index');
            }
        break;
        }
        
        if ($guard == "accountant" && Auth::guard($guard)->check()) {
            return redirect('/accountant');
        }
        if ($guard == "driver" && Auth::guard($guard)->check()) {
            return redirect('/driver');
        }
        if ($guard == "ordermanager" && Auth::guard($guard)->check()) {
            return redirect('/ordermanager');
        }
        if ($guard == "shipmentmanager" && Auth::guard($guard)->check()) {
            return redirect('/shipmentmanager');
        }
        if ($guard == "stockmanager" && Auth::guard($guard)->check()) {
            return redirect('/stockmanager');
        }
        if ($guard == "masons" && Auth::guard($guard)->check()) {
            return redirect('/masons');
        }
        if ($guard == "admins" && Auth::guard($guard)->check()) {
            return redirect('/admins');
        }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        if ($guard == "web" && Auth::guard($guard)->check()) {
            return redirect('user/signin');
        }


        return $next($request);
    }
}