<?php

namespace Library\Models;

use Library\Core\Model;

class User extends Model
{
    public function __construct()
    {
        $this->nameTable = 'users';
        parent::__construct();
    }
}