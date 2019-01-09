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

		$sessionUserId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

		if ($sessionUserId > 0) {
			$this->user = $this->loadUser($sessionUserId);
		}
	}

	protected function init()
	{
		return [
			'user' => $this->user
		];
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
