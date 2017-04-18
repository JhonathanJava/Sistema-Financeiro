<?php

use Psr\Http\Message\RequestInterface;
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

$app
	->get('/category-costs',function() use ($app){
		$view = $app->service('view.renderer');
		$meuModel = new \Financeiro\Models\CentroCusto();
		$categories = $meuModel->all();
		
		return $view->render('category-costs/list.html.twig', [
			'categories' => $categories
		]);
	}, 'category-costs.list')

	->get('/category-costs/new',function() use ($app){
		$view = $app->service('view.renderer');
		return $view->render('category-costs/create.html.twig');
	}, 'category-costs.new')

	->get('/category-costs/{id}/edit',function(ServerRequestInterface $request) use ($app){
		$view = $app->service('view.renderer');
		$id = $request->getAttribute('id');
		$category = \Financeiro\Models\CentroCusto::findOrFail($id);
		return $view->render('category-costs/edit.html.twig', [
			'category' => $category]);
	}, 'category-costs.edit')

	->get('/category-costs/{id}/show',function(ServerRequestInterface $request) use ($app){
		$view = $app->service('view.renderer');
		$id = $request->getAttribute('id');
		$category = \Financeiro\Models\CentroCusto::findOrFail($id);
		return $view->render('category-costs/show.html.twig', [
			'category' => $category]);
	}, 'category-costs.show')

	->get('/category-costs/{id}/delete',function(ServerRequestInterface $request) use ($app){
		$id = $request->getAttribute('id');
		$category = \Financeiro\Models\CentroCusto::findOrFail($id);
		$category->delete();
		return $app->route('category-costs.list');
	}, 'category-costs.delete')
	

	->post('/category-costs/{id}/update',function(ServerRequestInterface $request) use ($app){
		$id = $request->getAttribute('id');
		$category = \Financeiro\Models\CentroCusto::findOrFail($id);
		
		$data = $request->getParsedBody();
		$category->fill($data);
		$category->save();
		return $app->route('category-costs.list');
	}, 'category-costs.update')


	->post('/category-costs/store', function(ServerRequestInterface $request) use ($app) {
		// cadastro de categoria
		$data = $request->getParsedBody();
		\Financeiro\Models\CentroCusto::create($data);
		return $app->route('category-costs.list');
	}, 'category-costs.store');

$app->start();