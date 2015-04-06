<?php
require '../vendor/autoload.php';
require '../config.php';

$id = $_POST['id'];

echo json_encode(array(
	'status' => 'failed'
));