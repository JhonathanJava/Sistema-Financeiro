<?php


use Psr\Http\Message\ServerRequestInterface;



$app
    ->get('/category-costs',function() use ($app){
        $view = $app->service('view.renderer');        
        $repository = $app->service('category-cost.repository');
        $categories =  $repository->all();
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
        $repository = $app->service('category-cost.repository');
        $id = $request->getAttribute('id');
        $category = $repository->find($id);
        return $view->render('category-costs/edit.html.twig', [
            'category' => $category]);
    }, 'category-costs.edit')

    ->get('/category-costs/{id}/show',function(ServerRequestInterface $request) use ($app){
        $view = $app->service('view.renderer');
        $repository = $app->service('category-cost.repository');
        $id = $request->getAttribute('id');
        $category = $repository->find($id);
        return $view->render('category-costs/show.html.twig', [
            'category' => $category]);
    }, 'category-costs.show')

    ->get('/category-costs/{id}/delete',function(ServerRequestInterface $request) use ($app){
        $repository = $app->service('category-cost.repository');
        $id = $request->getAttribute('id');
        $repository->delete($id);
        return $app->route('category-costs.list');
    }, 'category-costs.delete')


    ->post('/category-costs/{id}/update',function(ServerRequestInterface $request) use ($app){
        $repository = $app->service('category-cost.repository');
        $id = $request->getAttribute('id');
        $data = $request->getParsedBody();
        $repository->update($id, $data);
        return $app->route('category-costs.list');
    }, 'category-costs.update')


    ->post('/category-costs/store', function(ServerRequestInterface $request) use ($app) {
        // cadastro de categoria
        $repository = $app->service('category-cost.repository');
        $data = $request->getParsedBody();
        $repository->create($data);
        return $app->route('category-costs.list');
    }, 'category-costs.store');