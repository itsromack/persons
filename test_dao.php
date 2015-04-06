<?php
require 'vendor/autoload.php';
require 'config.php';

function test_insert() {
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

test_insert();