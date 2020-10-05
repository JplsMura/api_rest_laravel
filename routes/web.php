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
    $router->get('/', 'EnderecoController@index');

    $router->get('/{id_endereco}', 'EnderecoController@endereco_especifico');
});

$router->group(['prefix' => '/cidade'], function () use ($router) {

    /*Listagem de Cidades*/
    $router->get('/', 'CidadeController@index');

    $router->get('/{id_cidade}', 'CidadeController@cidade_especifica');
});

//$router->group(['prefix' => '/estados'], function () use ($router) {
//
//    /*Listagem de Estados*/
//    $router->get('/estados', function () {
//
//    });
//
//    $router->get('/{id_estado}', function ($id_estado) {
//        return $id_estado;
//    });
//});
//
//$router->group(['prefix' => '/estados'], function () use ($router) {
//
//    /*Obter total de usuários cadastrados por cidade*/
//    $router->get('/total', function () {
//
//    });
//
//    /*Obter total de usuários cadastrados por estado*/
//    $router->get('/total', function () {
//
//    });
//});
