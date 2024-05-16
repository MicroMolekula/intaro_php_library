<?php

namespace Library\Models;

use Library\Core\Model;

class BookAuthor extends Model
{
    public function __construct()
    {
        $this->nameTable = 'book_author';
        parent::__construct();
    }
}