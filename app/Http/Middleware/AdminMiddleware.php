<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

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


   if(!Auth::check()){
        return route('/login');
    }
    $user = Auth::user();
    foreach($user->roles as $role){
        if($role->name=='admin'){
            return $next($request);
        }else{
            abort(404);
        }
    }
        return $next($request);
    }
}
