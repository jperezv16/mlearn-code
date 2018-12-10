<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;
use \App\Lib\Data;

class HomePage extends Page
{
    public function welcome(Request $request, Response $response, array $args) 
    {
        $data = [
            'totalLogs' => 0,
            'users' => $this->data->get('users')
        ];

        return $this->view->render($response, 'welcome.twig', $data);
    }
}
