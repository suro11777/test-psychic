<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;

class NewSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if(null === session(session()->getId())){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
