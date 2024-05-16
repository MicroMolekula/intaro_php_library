<?php

namespace Library\Models;

use Library\Core\Model;

class UsersBook extends Model
{
    public function __construct()
    {
        $this->nameTable = 'users_book';
        parent::__construct();
    }
}