<?php
require 'common.php';

$person = new Person(array(
	'id' => $_POST['id'],
	'firstName' => $_POST['firstName'],
	'lastName' => $_POST['lastName'],
	'birthdate' => $_POST['birthdate'],
	'gender' => $_POST['gender'],
	'homeAddress' => $_POST['homeAddress']
));

$personDao = new PersonDAO($db);
if ($personDao->update($person)) {
	echo json_encode(array(
		'status' => 1
	));
} else {
	echo json_encode(array(
		'status' => 0
	));
}
