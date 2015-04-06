<?php
require 'common.php';

$id = $_POST['id'];

$personDao = new PersonDAO($db);
if ($personDao->delete($id)) {
	echo json_encode(array(
		'status' => 1
	));
} else {
	echo json_encode(array(
		'status' => 0
	));
}
