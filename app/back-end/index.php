<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

ini_set('upload_max_filesize', '100M');
ini_set('post_max_size', '100M');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}
include_once __DIR__ . "/bootstrap.php";