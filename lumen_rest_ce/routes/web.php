<?php

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

$router->get('/u/:userId', function () use ($router) {
    echo "Route  /u/:userId ";
    return $router->app->version();
});

$router->get('/user', function () use ($router) {
    echo "Hello";
    return $router->app->version();
});