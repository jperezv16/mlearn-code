<?php

namespace App;

class Middlewares 
{
    public function loginVerify($redirect = "") 
    {
        return function($request, $response, $next) use ($redirect) 
        {
            if (empty($redirect)) {
                $redirect = '/';
            }

            if (isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] > 0) {
                return $response->withRedirect($redirect);
            }

            return $next($request, $response);
        };
    }

    public function loginRequire() 
    {
        return function($request, $response, $next)
        {
            if (!isset($_SESSION['user_id']) || (int)$_SESSION['user_id'] == 0) {
                return $response->withRedirect('/login');
            }

            return $next($request, $response);
        };
    }
}
