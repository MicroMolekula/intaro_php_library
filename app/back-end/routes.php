<?php

use Library\Core\Route;


$route = new Route();

// MainController
use Library\Controllers\Main\IndexController;
use Library\Controllers\Main\TestController;

$route->get('/hi/{test}', new IndexController);
$route->post('/test', new TestController);


if(!$route->getStatus()){
    http_response_code(404);
}
