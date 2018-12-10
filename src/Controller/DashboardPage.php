<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;
use \App\Lib\Data;

class DashboardPage extends Page
{
    public function notes(Request $request, Response $response, array $args) 
    {
        $data = [
            'notes' => $this->data->get('notes')
        ];

        return $this->view->render($response, 'notes.twig', $data);
    }
}
