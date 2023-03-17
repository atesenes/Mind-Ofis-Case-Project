<?php

namespace App\Http\Middleware;

use App\Models\siteLanguage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class frontDilSorgu
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
        if (empty(Session::get('dil'))){
            $varsayilan=siteLanguage::where('dilvarsayilan','=','on')->first();
            Session::put('dil',$varsayilan->diletiket);
            return redirect()->route('frontIndex');
        }else{
            return $next($request);
        }

    }
}
