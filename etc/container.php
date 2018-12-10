<?php

use \App\Core\FakeDatabase;

$container = $app->getContainer();

$container['view'] = function ($container) 
{
    $twigSettings = [
        'cache' => false,
        'debug' => true
    ];

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');

    $view = new \Slim\Views\Twig(__ROOT__.'/templates', $twigSettings);

    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    $view->addExtension(new \Twig_Extension_Debug());

    return $view;
};

$container['data'] = function($container)
{
    return new \App\Lib\Data(__ROOT__."etc/data");
};