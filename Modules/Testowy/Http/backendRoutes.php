<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/testowy'], function (Router $router) {
    $router->bind('kategory', function ($id) {
        return app('Modules\Testowy\Repositories\KategoryRepository')->find($id);
    });
    $router->get('kategories', [
        'as' => 'admin.testowy.kategory.index',
        'uses' => 'KategoryController@index',
        'middleware' => 'can:testowy.kategories.index'
    ]);
    $router->get('kategories/create', [
        'as' => 'admin.testowy.kategory.create',
        'uses' => 'KategoryController@create',
        'middleware' => 'can:testowy.kategories.create'
    ]);
    $router->post('kategories', [
        'as' => 'admin.testowy.kategory.store',
        'uses' => 'KategoryController@store',
        'middleware' => 'can:testowy.kategories.create'
    ]);
    $router->get('kategories/{kategory}/edit', [
        'as' => 'admin.testowy.kategory.edit',
        'uses' => 'KategoryController@edit',
        'middleware' => 'can:testowy.kategories.edit'
    ]);
    $router->put('kategories/{kategory}', [
        'as' => 'admin.testowy.kategory.update',
        'uses' => 'KategoryController@update',
        'middleware' => 'can:testowy.kategories.edit'
    ]);
    $router->delete('kategories/{kategory}', [
        'as' => 'admin.testowy.kategory.destroy',
        'uses' => 'KategoryController@destroy',
        'middleware' => 'can:testowy.kategories.destroy'
    ]);
    $router->bind('products', function ($id) {
        return app('Modules\Testowy\Repositories\ProductsRepository')->find($id);
    });
    $router->get('products', [
        'as' => 'admin.testowy.products.index',
        'uses' => 'ProductsController@index',
        'middleware' => 'can:testowy.products.index'
    ]);
    $router->get('products/create', [
        'as' => 'admin.testowy.products.create',
        'uses' => 'ProductsController@create',
        'middleware' => 'can:testowy.products.create'
    ]);
    $router->post('products', [
        'as' => 'admin.testowy.products.store',
        'uses' => 'ProductsController@store',
        'middleware' => 'can:testowy.products.create'
    ]);
    $router->get('products/{products}/edit', [
        'as' => 'admin.testowy.products.edit',
        'uses' => 'ProductsController@edit',
        'middleware' => 'can:testowy.products.edit'
    ]);
    $router->put('products/{products}', [
        'as' => 'admin.testowy.products.update',
        'uses' => 'ProductsController@update',
        'middleware' => 'can:testowy.products.edit'
    ]);
    $router->delete('products/{products}', [
        'as' => 'admin.testowy.products.destroy',
        'uses' => 'ProductsController@destroy',
        'middleware' => 'can:testowy.products.destroy'
    ]);
// append


});
