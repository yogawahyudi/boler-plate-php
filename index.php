<?php
require 'vendor/autoload.php';
session_start();

use App\Middleware\CustomMiddleware;
use App\Router\Router;
$router = new Router();

// Tambahkan rute
$router->addRoute( '/', 'HomeController@index', ['GET'], [CustomMiddleware::class]);
$router->addRoute('/about/about', 'HomeController@about', ['GET']);
$router->addRoute('/data', 'DataController@index', ['GET']);
$router->addRoute('/criteria', 'CriteriaController@index', ['GET']);
$router->addRoute('/criteria/create', 'CriteriaController@create', ['GET']);
$router->addRoute('/criteria/store', 'CriteriaController@store', ['POST']);

// Jalankan router
$router->route($_SERVER['REQUEST_URI']);
