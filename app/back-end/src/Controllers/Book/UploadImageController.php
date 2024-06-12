<?php

namespace Library\Controllers\Book;

use Library\Core\Controller;
use Library\Models\Book;
use Library\Core\Utility;


class UploadImageController extends Controller
{
    public function __invoke()
    {
        $filename = __DIR__ . "/../../../public/storage/images/" . Utility::translit($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $filename);
        return ['type' => 'image', 'image_book' => '/public/storage/images/' . Utility::translit($_FILES['image']['name'])];
    }
}