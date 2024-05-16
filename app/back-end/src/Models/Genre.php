<?php

namespace Library\Models;

use Library\Core\Model;

class Genre extends Model
{
    public function __construct()
    {
        $this->nameTable = 'genre';
        parent::__construct();
    }
}