<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekAdmin
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
        // $user = \App\User::where('email', $request->email)->first();
        // if ($user['admin'] == '1') {
        //     return redirect('admin');
        // } elseif ($user['admin'] == '0') {
        //     return redirect('mutation');
        // }
        // if ((!Auth::guest()) && (Auth::user()->admin==1))
        // {
        //     return $next($request);
        // }
        // return redirect('/');

        $user = Auth::user();

        if ($user && $user->admin != $admin) {
            
            return App::abort(Auth::check() ? 403 : 401, Auth::check() ? 'Forbidden' : 'Unauthorized');
            //return redirect()->back();
            
        }

        return $next($request);        
    }
}
