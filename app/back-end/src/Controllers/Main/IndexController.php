<?php

namespace Library\Controllers\Main;

use Library\Core\Controller;
use Library\Core\Utility;
use Library\Models\Book;

class IndexController extends Controller
{
    function __invoke($request, $arg)
    {
        $bookModel = new Book();
        $books = $bookModel->find(2);
        return $books;
    }
}