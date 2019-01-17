<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;
use \App\Lib\Data;
use \App\Lib\User;

class HomePage extends Page
{
    public function welcome(Request $request, Response $response, array $args) 
    {
        $page = $this->init();

        $page['users'] = $this->loadAllUsers();

        return $this->view->render($response, 'welcome.twig', $page);
    }

    private function loadAllUsers()
    {
    	$users = [];

		foreach ($this->data->get('users') as $id => $data) {
			$user = new User();

			$user->setId($id);
			$user->setUsername($data['username']);
			$user->setDescription($data['description']);
			$user->setFirstname($data['firstname']);
			$user->setLastname($data['lastname']);
			$user->setPassword($data['password']);

			$users[] = $user;
		}

		return $users;
    }
}
