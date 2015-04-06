<?php
require 'vendor/autoload.php';
require 'config.php';

require_once("src/Person/Person.php");
require_once("src/Person/PersonDAO.php");

function test_insert() {
	global $db;
	$birthdate = new \DateTime('1982-11-19');

	$person = new Person(array(
		'id' => null,
		'firstName' => 'Romack',
		'lastName' => 'Natividad',
		'birthdate' => $birthdate->format('Y-m-d'),
		'gender' => 'Male',
		'homeAddress' => '167 M.H. del Pilar St., Dulongbayan 2, San Mateo, Rizal'
	));

	$personDao = new PersonDAO($db);
	if ($personDao->create($person)) {
		echo 'Created a person';
	} else {
		echo 'Failed to create a person';
	}
}


function test_get_all() {
	global $db;
	$personDao = new PersonDAO($db);
	$persons = $personDao->getAllPersons();
	var_dump($persons);
}

test_insert();
test_get_all();