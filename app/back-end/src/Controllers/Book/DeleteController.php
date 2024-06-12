<?php
namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;


class DeleteController extends Controller
{
    public function __invoke($request)
    {
        $book = (new Book())->find($request['id']);
        if($book) {
            (new Book())->delete($request['id']);
            return ['status' => 'ok'];
        }
        return ['status' => 'error'];
    }
}