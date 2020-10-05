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

    /*Obter total de usuários cadastrados por cidade*/
    $router->get('/quantidade/{nome}', 'CidadeController@countCidade' );
});

$router->group(['prefix' => '/estado'], function () use ($router) {

    /*Listagem de Estados*/
    $router->get('/', 'EstadoController@index');

    $router->get('/{id_estado}', 'EstadoController@estado_especifico');

    /*Obter total de usuários cadastrados por estado*/
    $router->get('/quantidade/{nome}', 'EstadoController@countEstado' );
});
