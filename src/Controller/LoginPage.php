<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;
use \App\Lib\Auth\Auth;
use \App\Lib\Auth\AuthUser;

class LoginPage extends Page
{
    public function validate(Request $request, Response $response, array $args)
    {
        $data = [
            'error' => "authentification_error"
        ];

        return $this->view->render($response, 'login.twig', $data);
    }

    public function form(Request $request, Response $response, array $args) 
    {
        $data = [
            'message' => "Please enter your credentials"
        ];

        return $this->view->render($response, 'login.twig', $data);
    }
}
