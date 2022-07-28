<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckloginUserStatus
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
        $user = $request->user();
        // Nếu role của user mà bằng 2 thì mới vào được admin
        if($user->role !=2){
            // Nếu không đáp ứng được thì tự quay về error 404
            return redirect()->route('404');
        }
        return $next($request);
    }
}
