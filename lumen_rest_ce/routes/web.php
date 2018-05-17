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

// ROUTE - TEST ALL ORDERS 
$router->get('/u/{numUser}/orders', ['uses' => 'CommandeController@AllUserCommandes']);

// ROUTE 8 - VENTES PAR MOIS 
$router->get('/u/{numUser}/sales/month/commandes', ['uses' => 'UserController@monthlySales']);

// ROUTE 11 - Commandes en cours par User classées par Clients Alphabétique
 $router->get('/u/{numUser}/orders/current/1', ['uses' => 'CommandeController@currentCommandeName']);

// ROUTE 12 - Commandes en cours par User classées par date
 $router->get('/u/{numUser}/orders/current/2', ['uses' => 'CommandeController@currentCommandeDate']);


// ROUTE 13 - Commandes passées par User classées par Clients Alphabétique
 $router->get('/u/{numUser}/orders/old/1', ['uses' => 'CommandeController@oldCommandeName']);

// ROUTE 14 - Commandes passées par User classées par date
 $router->get('/u/{numUser}/orders/old/2', ['uses' => 'CommandeController@oldCommandeDate']);



