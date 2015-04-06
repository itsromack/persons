<?php
require 'common.php';

$id = $_POST['id'];

$personDao = new PersonDAO($db);
$person = $personDao->get($id);
if ($person instanceof Person) {
	echo json_encode(array(
		'status' => 1,
		'person' => array(
			'id' => $person->getId(),
			'firstName' => $person->getFirstName(),
			'lastName' => $person->getLastName(),
			'birthdate' => $person->getBirthdate(),
			'gender' => $person->getGender(),
			'homeAddress' => $person->getHomeAddress()
		)
	));
} else {
	echo json_encode(array(
		'status' => 0
	));
}
