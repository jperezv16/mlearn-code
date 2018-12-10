<?php

use \Slim\Http\Request;
use \Slim\Http\Response;

$app->get('/', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\HomePage($container['data'], $container['view']);
	return $controller->welcome($request, $response, $args);
});

$app->get('/dashboard', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\DashboardPage($container['data'], $container['view']);
	return $controller->notes($request, $response, $args);
});

$app->get('/login', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\LoginPage($container['data'], $container['view']);
	return $controller->form($request, $response, $args);
});

$app->post('/login', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\LoginPage($container['data'], $container['view']);
	return $controller->validate($request, $response, $args);
});