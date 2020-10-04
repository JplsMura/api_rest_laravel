<?php

$router->group(['prefix' => '/user'], function () use ($router) {

    /*Listagem de registros*/
    $router->get('/', 'UserController@index');

    $router->post('/create', 'UserController@create');

    $router->put('/update/{id}', 'UserController@update');

    $router->delete('/destroy/{id}', 'UserController@destroy');

});

$router->group(['prefix' => '/endereco'], function () use ($router) {

    /*Listagem de Endereços*/
    $router->get('/endereco', function () {

    });

    $router->get('/{id_endereco}', function ($id_endereco) {
        return $id_endereco;
    });
});

$router->group(['prefix' => '/cidades'], function () use ($router) {

    /*Listagem de Cidades*/
    $router->get('/cidades', function () {

    });

    $router->get('/{id_cidade}', function ($id_cidade) {
        return $id_cidade;
    });
});

$router->group(['prefix' => '/estados'], function () use ($router) {

    /*Listagem de Estados*/
    $router->get('/estados', function () {

    });

    $router->get('/{id_estado}', function ($id_estado) {
        return $id_estado;
    });
});

$router->group(['prefix' => '/estados'], function () use ($router) {

    /*Obter total de usuários cadastrados por cidade*/
    $router->get('/total', function () {

    });

    /*Obter total de usuários cadastrados por estado*/
    $router->get('/total', function () {

    });
});
