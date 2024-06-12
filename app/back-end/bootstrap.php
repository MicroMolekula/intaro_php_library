<?php

include_once __DIR__ . "/vendor/autoload.php";

use Library\Core\DB;
DB::connect('.env');

include_once __DIR__ . "/src/routes.php";