<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class UserCheckVC
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

        $type = Type::findOrFail($requestId);

        if($type->user_id != $loginId){
            return abort(404);
        }

        return $next($request);
    }
}
