<?php
require 'vendor/autoload.php';

use App\Middleware\CustomMiddleware;
use App\Router\Router;
$router = new Router();

// Tambahkan rute
$router->addRoute( '/', 'HomeController@index', ['GET'], [CustomMiddleware::class]);
$router->addRoute('/about/about', 'HomeController@about', ['GET']);

// Jalankan router
$router->route($_SERVER['REQUEST_URI']);
