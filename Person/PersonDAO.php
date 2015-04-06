<?php

class PersonDAO {
	protected $pdo;

	public function __construct(\PDO $db) {
		$this->pdo = $db;
	}

	public function create(Person $person) {
		$statement = $this->pdo->prepare('
			INSERT INTO tblpersons (first_name, last_name, birthdate, gender, home_address)
			VALUES (
				:first_name,
				:last_name,
				:birthdate,
				:gender,
				:home_address
			)
		');
		$statement->execute(array(
			':first_name' => $person->getFirstName(),
			':last_name' => $person->getLastName(),
			':birthdate' => $person->getBirthdate(),
			':gender' => $person->getGender(true),
			':home_address' => $person->getHomeAddress()
		));
		if ($statement->rowCount()) {
			return true;
		}
		return false;
	}

	public function getAllPersons() {
		$statement = $this->pdo->query('
			SELECT
				id,
				first_name firstName,
				last_name lastName,
				birthdate,
				gender,
				home_address homeAddress
			FROM tblpersons
		');
		if ($statement->rowCount()) {
			$persons = arrray();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$persons[] = new Person($row);
			}
			return $persons;
		}
		return false;
	}
}