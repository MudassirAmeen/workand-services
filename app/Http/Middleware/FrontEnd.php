<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class FrontEnd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userID = Session::get('User_id');

        if ($userID) {
            $match = DB::table('new_users')->where('id', $userID)->first();
            if ($match) {
                return $next($request);
            }
        }

        Session::forget('User_id');
        return $next($request);
    }
}
