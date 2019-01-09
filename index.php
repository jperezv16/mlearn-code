<?php

define("__ROOT__", $_SERVER['DOCUMENT_ROOT']."/");

$autoload = __ROOT__.'vendor/autoload.php';

if (!file_exists($autoload)) {
	echo "
		<b>System Requirements</b><br>
		1. PHP 5.5 or newer<br>
		2. Composer - Don’t have Composer? It’s easy to install by following the instructions on their <a href='https://getcomposer.org/download/' target='_blank'>download</a> page.
		<br>
		<br>
		<b>Installation</b><br>
		3. cd /path/to/your/mlg-code-ex<br>
		4. composer install<br>
		5. php -S localhost:8000
	";
	exit;
}

require $autoload;

error_reporting(E_ALL);

ini_set('display_errors', 'On');

$settings = [
    'displayErrorDetails' => true
];

if (empty($_SESSION)) {
    session_start();
}

$app = new \Slim\App(["settings" => $settings]);

require __ROOT__.'etc/container.php';

require __ROOT__.'etc/routes.php';

$app->run();


