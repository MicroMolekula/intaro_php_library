<?php

namespace Library\Controllers\Main;

use Library\Core\Controller;

class IndexController extends Controller
{
    function __invoke($request, $arg)
    {
        return $arg;
    }
}