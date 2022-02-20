<?php

namespace App\Http\Middleware;

use App\Models\Invites;
use Closure;
use Illuminate\Http\Request;

class checkToken
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
        $token = explode("/", url()->current());
        $token = $token[count($token) - 1];
        $token_from_db = Invites::where('token', '=', $token)->first();

//        dd($token_from_db);
        if($token_from_db == NULL) {
//            dd("Токен параша");
            return redirect()->route("start-page");
        }

        return $next($request);
    }
}
