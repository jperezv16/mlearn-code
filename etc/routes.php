<?php

use \Slim\Http\Request;
use \Slim\Http\Response;

$middlewares = new \App\Middlewares();

$app->get('/', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\HomePage($container['data'], $container['view']);
	return $controller->welcome($request, $response, $args);
});

$app->get('/dashboard', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\DashboardPage($container['data'], $container['view']);
	return $controller->notes($request, $response, $args);
})->add($middlewares->loginRequire());

$app->post('/dashboard/notes/{id}/delete', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\DashboardPage($container['data'], $container['view']);
	return $controller->deleteNote($request, $response, $args);
})->add($middlewares->loginRequire());

$app->post('/dashboard/notes/add', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\DashboardPage($container['data'], $container['view']);
	return $controller->addNote($request, $response, $args);
})->add($middlewares->loginRequire());

$app->get('/login', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\LoginPage($container['data'], $container['view']);
	return $controller->form($request, $response, $args);
})->add($middlewares->loginVerify('/dashboard'));

$app->post('/login/validate', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\LoginPage($container['data'], $container['view']);
	return $controller->validate($request, $response, $args);
});

$app->get('/logout', function(Request $request, Response $response, array $args) use ($container) {
	$controller = new \App\Controller\LoginPage($container['data'], $container['view']);
	return $controller->logout($request, $response, $args);
});