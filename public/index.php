<?php

use Psr\Http\Message\ServerRequestInterface;
use Financeiro\Application;
use Financeiro\ServiceContainer;
use Financeiro\Plugins\ViewPlugin;
use Financeiro\Plugins\RouterPlugin;
use Financeiro\Plugins\DBPlugin;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RouterPlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DBPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
	$response = new \Zend\Diactoros\Response();
	$response->getBody()->write("Response com emmiter do diactoros");
	return $response;
});

require_once __DIR__ . '/../src/controllers/category-costs.php';

$app->start();