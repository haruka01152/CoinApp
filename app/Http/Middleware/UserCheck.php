<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Coin;
use Illuminate\Support\Facades\Auth;

class UserCheck
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
        $loginId = Auth::id();
        $requestId = $request->id;

        $coin = Coin::findOrFail($requestId);

        if($coin->user_id != $loginId){
            return abort(404);
        }

        return $next($request);
    }
}
