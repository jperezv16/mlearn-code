<?php

define("__ROOT__", $_SERVER['DOCUMENT_ROOT']."/");

require __ROOT__.'vendor/autoload.php';

error_reporting(E_ALL);

ini_set('display_errors', 'On');

$settings = [
    'displayErrorDetails' => true
];

$app = new \Slim\App(["settings" => $settings]);

require __ROOT__.'etc/container.php';

require __ROOT__.'etc/routes.php';

$app->run();


