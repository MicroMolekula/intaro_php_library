<?php

namespace Library\Controllers\Main;

use Library\Core\Controller;
use Library\Core\Utility;
use Library\Models\Book;

class IndexController extends Controller
{
    function __invoke($request, $arg)
    {
        $book = (new Book())->find(1);
        var_dump($book);
        return $book->toArray();
    }
}
