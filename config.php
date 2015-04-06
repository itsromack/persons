<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'test_user');
define('DB_PASSWORD', 'password');
define('DB', 'test');

$connection = 'mysql:host=' . DB_HOST . ';dbname=' . DB;
$db = new PDO($connection, DB_USER, DB_PASSWORD);
