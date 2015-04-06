<?php

use Person\Gender;

class Person {
	protected $id;
	protected $firstName;
	protected $lastName;
	protected $birthdate;
	protected $gender;
	protected $homeAddress;

	public function __construct($vars) {
		$this->id = $vars['id'];
		$this->firstName = $vars['firstName'];
		$this->lastName = $vars['lastName'];
		$this->birthdate = $vars['birthdate'];
		$this->gender = $vars['gender'];
		$this->homeAddress = $vars['homeAddress'];
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setFirstName($name) {
		$this->firstName = $name;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($name) {
		$this->lastName = $name;
	}

	public function getBirthdate() {
		return $this->birthdate;
	}

	public function setBirthdate(\DateTime $birthdate) {
		$this->birthdate = $birthdate;
	}

	public function getGender($isForDB = false) {
		if (in_array($gender, array(Gender::GENDER_MALE, Gender::MALE)) {
			return ($isForDB) ? Gender::GENDER_MALE : Gender::MALE;
		} elseif (in_array($gender, array(Gender::GENDER_FEMALE, Gender::FEMALE)) {
			return ($isForDB) ? Gender::GENDER_FEMALE : Gender::FEMALE;
		} else {
			return null;
		}
	}

	public function setBirthdate($gender) {
		if (in_array($gender, array(Gender::GENDER_MALE, Gender::MALE)) {
			$this->gender = Gender::MALE;
		if (in_array($gender, array(Gender::GENDER_FEMALE, Gender::FEMALE)) {
			$this->gender = Gender::FEMALE;
		}
	}

	public function getHomeAddress() {
		return $this->homeAddress;
	}

	public function setHomeAddress($homeAddress) {
		$this->homeAddress = $homeAddress;
	}
}