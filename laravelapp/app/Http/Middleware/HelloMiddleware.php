<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
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
        $data = [
            ["name"=>"aaaa","mail"=>"aaaa@zzzz"],
            ["name"=>"bbbb","mail"=>"bbbb@yyyy"],
            ["name"=>"cccc","mail"=>"cccc@xxxx"],
        ];
        $request->merge(['data'=>$data]);
        return $next($request);
    }
}
