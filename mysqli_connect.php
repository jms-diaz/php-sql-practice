<?php

define('DB_USER', 'james');
define('DB_PASSWORD', 'james');
define('DB_HOST', 'localhost');
define('DB_NAME', 'simpledb');

try {
    $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($dbcon, 'utf8');
} catch (Throwable $th) {
    print('The system is busy. Please try later.');
} catch(Error $e) {
    print('The system is busy. Please try again later.');
}
?>