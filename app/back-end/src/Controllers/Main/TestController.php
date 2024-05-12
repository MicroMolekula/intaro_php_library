<?php

namespace Library\Controllers\Main;

use Library\Core\Controller;

class TestController extends Controller
{
    function __invoke($request){
        $request['surname'] = 'Krasikov';
        return $request;
    }
}