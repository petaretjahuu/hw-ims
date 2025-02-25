<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../config/config.php';

echo 'DB_HOST: ' . DB_HOST . '<br>';
echo 'DB_NAME: ' . DB_NAME . '<br>';
echo 'DB_USER: ' . DB_USER . '<br>';
echo 'DB_PASS: ' . DB_PASS . '<br>';

?>