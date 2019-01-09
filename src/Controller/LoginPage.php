<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;

class LoginPage extends Page
{
    public function validate(Request $request, Response $response, array $args)
    {
        $username = $request->getParam('username', '');

        $password = $request->getParam('password', '');

        $user = $this->loadUser($username);

        if ($user != null && $user->passwordVerify($password)) {
            $this->data->save('session', ['userId' => $user->getId()]);
            return $response->withRedirect("/dashboard?login=success");
        }

        return $response->withRedirect("/login?state=error");
    }

    public function form(Request $request, Response $response, array $args) 
    {
        $data = [
            'message' => "Please enter your credentials"
        ];

        return $this->view->render($response, 'login.twig', $data);
    }
}
