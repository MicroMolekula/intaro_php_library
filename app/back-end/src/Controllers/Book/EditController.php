<?php
namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;

class EditController extends Controller
{
    public function __invoke($request): array
    {
        $book = (new Book())->find($request['id']);
        if($book){
            $book->title = $request['title'];
            $book->author = $request['author'];
            $book->genre = $request['genre'];
            $book->image_book = $request['image_book'];
            $book->file_book = $request['file_book'];
            $book->download_allow = $request['download_allow'];
            $book->created_at = $request['created_at'];
            return ['status' => $book->save() ? 'ok' : 'error'];
        }
        return ['status' => 'error'];
    }
}