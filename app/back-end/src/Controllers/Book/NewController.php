<?php

namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;

class NewController extends Controller
{
    public function __invoke($request)
    {
        $book = new Book();
        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->genre = $request['genre'];
        $book->image_book = $request['image_book'];
        $book->file_book = $request['file_book'];
        $book->created_at = $request['created_at'];
        $book->download_allow = $request['download_allow'];
        return ['status' => $book->save() ? 'ok' : 'error'];
    }
}