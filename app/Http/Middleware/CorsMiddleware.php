<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 17:03
 */

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE');
        header('Access-Control-Max-Age: 1728000');
        if ($request->isMethod('options')) {
            exit();
        }
        return $next($request);
    }
}
