<?php

namespace Library\Models;

use Library\Core\Model;

class Book extends Model
{
    public function __construct()
    {
        $this->nameTable = 'book';
        parent::__construct();
    }
}