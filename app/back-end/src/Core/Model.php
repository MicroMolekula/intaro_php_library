<?php

namespace Library\Core;

use \PDO;

abstract class Model
{
    protected PDO $db;
    protected string $nameTable;
}