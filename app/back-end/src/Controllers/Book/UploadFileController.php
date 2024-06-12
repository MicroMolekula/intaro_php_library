<?php

namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;
use Library\Core\Utility;


class UploadFileController extends Controller
{
    public function __invoke()
    {
        $filename = __DIR__ . "/../../../public/storage/books/" . Utility::translit($_FILES['book']['name']);
        move_uploaded_file($_FILES['book']['tmp_name'], $filename);
        return ['type' => 'file','file_book' => '/public/storage/books/' . Utility::translit($_FILES['book']['name'])];
    }
}