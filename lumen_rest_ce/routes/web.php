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

// ROUTE 0 - Test Hello World 
$router->get('/', function () use ($router) {
	    echo "HELLO WORLD ";
    return $router->app->version();
});


// ROUTE 12 - Commandes en cours classées par date

 $router->get('/{numcli}/commandes', ['uses' => 'CommandeController@currentCommande']);











/* 6 - Informations personnelles
$router->get('/u/{userId}', function ($userId) use ($router) {
    echo "hello" .$userId ;
    return $router->app->version();
});

// 7 - Objectifs 
$router->get('/u/{userId}/goals', function ($userId) use ($router) {
    echo "USER GOALS ";
    return $router->app->version();
});

// 8 - Ventes par mois
$router->get('/u/{userId}/sales/month/:month', function ($userId) use ($router) {
    echo "MONTHLY SALES";
    return $router->app->version();
});

// 11 -  Commandes en cours classées par client 
$router->get(' /u/:userId/orders/current/:sort', function ($userId) use ($router) {
    echo "ORDERS";
    return $router->app->version();
}); */


