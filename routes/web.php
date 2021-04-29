<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    //routes para as ferramentas
    $router->get('tools',  ['uses' => 'ToolController@index']);
    $router->get('tools/{id}', ['uses' => 'ToolController@show']);
    $router->get('tools/tag/{tag}', ['uses' => 'ToolController@showTag']);
    $router->post('tools', ['uses' => 'ToolController@create']);
    $router->delete('tools/{id}', ['uses' => 'ToolController@delete']);
    $router->put('tools/{id}', ['uses' => 'ToolController@update']);

    //routes para logout, dados do usuário autenticado e logout
    $router->post('logout', 'AuthController@logout');
    $router->patch('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    //routes para registro e autenticação de usuários
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});
