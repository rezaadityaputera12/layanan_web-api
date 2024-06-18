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
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');

});
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('me', 'AuthController@me');
});
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('dokter', 'DokterController@index'); // Read all
    $router->get('dokter/{id}', 'DokterController@show'); // Read one

    $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
        $router->post('dokter', 'DokterController@store'); // Create
        $router->put('dokter/{id}', 'DokterController@update'); // Update
        $router->delete('dokter/{id}', 'DokterController@destroy'); // Delete
    });
});

