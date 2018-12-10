<?php

namespace App\Controller;

use \Slim\Views\Twig;
use \App\Lib\Data;

class Page
{
	protected $data = null;
	protected $view = null;

	public function __construct(Data $data, Twig $view)
    {
        $this->data = $data;
		$this->view = $view;
	}	
}
