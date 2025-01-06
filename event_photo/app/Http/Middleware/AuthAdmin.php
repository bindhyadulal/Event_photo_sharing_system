<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Response;

// class AuthAdmin
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         if(Auth::check())
//         {
//             if(Auth::user()->utype=='ADM')
//             {             
//                 return $next($request);
//             }
//             else{
//                 Session::flush();
//                 return redirect()->route('login');
//             }
//         }else{
//             return redirect()->route('login');
//         }
//     }
// }


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            Log::info('User is not authenticated in AuthAdmin middleware');
            return redirect()->route('login');
        }

        // Check if the user is an admin
        if (!auth()->user()->is_admin) {
            Log::info('User is not an admin in AuthAdmin middleware');
            return redirect()->route('login');  // Redirect to login or another page if not an admin
        }

        return $next($request);
    }
}
