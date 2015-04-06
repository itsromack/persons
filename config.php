<?php

define('DB_DRIVER', 'mysql');
define('DB_HOST', '172.16.8.103');
define('DB_USER', 'test_user');
define('DB_PASSWORD', 'password');
define('DB', 'test');

try {
	$connection = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB;
	$db = new \PDO($connection, DB_USER, DB_PASSWORD);
} catch(\PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}