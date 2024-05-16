<?php

namespace Library\Models;

use Library\Core\Model;

class BookGenre extends Model
{
    public function __construct()
    {
        $this->nameTable = 'book_genre';
        parent::__construct();
    }
}