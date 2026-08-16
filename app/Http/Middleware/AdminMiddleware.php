<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{


    public function handle(Request $request, Closure $next)
    {


        if(!Auth::check())
        {

            return redirect('/login');

        }



        if(Auth::user()->role !== 'admin')
        {


            Auth::logout();


            $request->session()->invalidate();


            $request->session()->regenerateToken();



            return redirect('/login')
                ->with('error','Session expired.');


        }



        return $next($request);


    }


}