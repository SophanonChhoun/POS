<?php

namespace App\Http\Middleware;

use App\Models\UserLoginAccess;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = Session::get("auth")['access_token'] ?? null;
        $logIn = UserLoginAccess::where("access_token",$token)->first();
        if (!$logIn) {
            return redirect('/');
        }
        return $next($request);
    }
}
