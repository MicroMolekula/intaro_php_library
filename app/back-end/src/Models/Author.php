<?php

namespace Library\Models;

use Library\Core\Model;

class Author extends Model
{
    public function __construct()
    {
        $this->nameTable = 'author';
        parent::__construct();
    }
}