<?php

use Library\Core\Route;


$route = new Route();

// MainController
use Library\Controllers\Main\IndexController;
use Library\Controllers\Main\TestController;

$route->get('/hi', IndexController::class);
$route->post('/test', TestController::class);

$route->get('/', IndexController::class);

//Book
$route->get('/book', Library\Controllers\Book\IndexController::class);
$route->files('/book/upload', \Library\Controllers\Book\UploadFileController::class);
$route->files('/book/image_upload', \Library\Controllers\Book\UploadImageController::class);
$route->post('/book/new', \Library\Controllers\Book\NewController::class);
$route->post('/book/edit', \Library\Controllers\Book\EditController::class);
$route->post('/book/delete', \Library\Controllers\Book\DeleteController::class);

//Users
$route->post('/users/new', \Library\Controllers\Users\NewController::class);
$route->post('/users/auth', \Library\Controllers\Users\AuthController::class);




if(!$route->getStatus()){
    http_response_code(404);
}
