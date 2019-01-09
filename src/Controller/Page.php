<?php

namespace App\Controller;

use \Slim\Views\Twig;
use \App\Lib\Data;
use \App\Lib\User;

class Page
{
	protected $data = null;
	protected $view = null;
	protected $user = null;

	public function __construct(Data $data, Twig $view)
    {
        $this->data = $data;
		$this->view = $view;

		$session = $this->data->get('session');

		if (isset($session['userId'])) {
			$this->user = $this->loadUser($session['userId']);
		}
	}

	public function loadUser($userNameOrUserId)
	{
		$users = $this->data->get('users');

		foreach ($users as $id => $data) {
			if ($data['username'] == $userNameOrUserId || $id == $userNameOrUserId) {
				$user = new User();

				$user->setId($id);
				$user->setUsername($data['username']);
				$user->setFirstname($data['firstname']);
				$user->setLastname($data['lastname']);
				$user->setPassword($data['password']);

				return $user;
			}
		}

		return null;
	}
}
