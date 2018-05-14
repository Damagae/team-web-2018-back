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
	    echo "HELLO WORLD ";
    return $router->app->version();
});


$router->get('user/alluser', 'UserController@showAllUser');


$router->get('/u/{userId}', function ($userId) use ($router) {
    echo "hello" .$userId ;
    return $router->app->version();
});



$router->get('/u/{userId}/goals', function ($userId) use ($router) {
    echo "USER GOALS ";
    return $router->app->version();
});

$router->get('/u/{userId}/sales/month/:month', function ($userId) use ($router) {
    echo "MONTHLY SALES";
    return $router->app->version();
});


$router->get(' /u/:userId/orders/current/:sort', function ($userId) use ($router) {
    echo "ORDERS";
    return $router->app->version();
});




$router->get(' /u/:userId/orders/old/:sort', function ($userId) use ($router) {
    echo "OLD ORDERS";
    return $router->app->version();
});
