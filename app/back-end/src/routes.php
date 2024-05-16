<?php

use Library\Core\Route;


$route = new Route();

// MainController
use Library\Controllers\Main\IndexController;
use Library\Controllers\Main\TestController;

$route->get('/hi', IndexController::class);
$route->post('/test', TestController::class);

$route->get('/', IndexController::class);

if(!$route->getStatus()){
    http_response_code(404);
}
