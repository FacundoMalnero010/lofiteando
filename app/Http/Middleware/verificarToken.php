<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class verificarToken
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
        $tokenParam = $request->input('token');

        try{
            $tokenBBDD = DB::selectOne("SELECT token FROM resetpassword WHERE token= :token", ['token' => $tokenParam]);

            if(isset($tokenBBDD)){

                return $next($request);

            }
        }
        catch (ValidationException $exception){
        }

        return abort(403);

    }
}
