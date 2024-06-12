<?php

namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;

class IndexController extends Controller
{
    function __invoke($request)
    {
        $books = (new Book())->all();
        $response = [];
        foreach($books as $book){
            $response[] = $book->toArray();
        }
        return $response;
    }
}
