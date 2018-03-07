<?php

namespace App\Http\Middleware;

use Session;
use Auth;
use Closure;

class Admin
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
        //Here it is a custom middleware which is used to give the user permission
        //The first line checks that, wheather in the user table the admin field is true(1) or false(0)
        //Then we go to kernel.php to activate the middleware
        if(!Auth::user()->admin)
        {
            Session::flash('info', 'You do not have permission to perform this action.');

            return redirect()->back();
        }
        return $next($request);
    }
}
