<?php

class PersonDAO {
	protected $pdo;

	public function __construct(\PDO $db) {
		$this->pdo = $db;
	}

	public function create(Person $person) {
		try {
			$statement = $this->pdo->prepare('
				INSERT INTO tblpersons (
					first_name,
					last_name,
					birthdate,
					gender,
					home_address
				)
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
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}
		return false;
	}

	public function get($id) {
		$statement = $this->pdo->prepare('
			SELECT
				id,
				first_name firstName,
				last_name lastName,
				DATE_FORMAT(birthdate, "%Y-%m-%d") birthdate,
				gender,
				home_address homeAddress
			FROM tblpersons
			WHERE
				id = :id
				AND deleted IS NULL
		');
		$statement->execute(array(
			'id' => $id
		));
		if ($statement->rowCount()) {
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			return new Person($row);
		}
		return false;
	}

	public function update(Person $person) {
		$statement = $this->pdo->prepare('
			UPDATE tblpersons SET
				first_name = :first_name,
				last_name = :last_name,
				birthdate = :birthdate,
				gender = :gender,
				home_address = :home_address
			WHERE id = :id
		');
		$statement->execute(array(
			':first_name' => $person->getFirstName(),
			':last_name' => $person->getLastName(),
			':birthdate' => $person->getBirthdate(),
			':gender' => $person->getGender(true),
			':home_address' => $person->getHomeAddress(),
			':id' => $person->getId()
		));
		if ($statement->rowCount()) {
			return true;
		}
		return false;
	}

	public function delete($id) {
		try {
			$statement = $this->pdo->prepare('
				UPDATE tblpersons SET
					deleted = NOW()
				WHERE id = :id
			');
			$statement->execute(array(
				':id' => $id
			));
			return true;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}
		return false;
	}

	public function getAllPersons() {
		$statement = $this->pdo->query('
			SELECT
				id,
				first_name firstName,
				last_name lastName,
				DATE_FORMAT(birthdate, "%M %e, %Y") birthdate,
				gender,
				home_address homeAddress
			FROM tblpersons
			WHERE deleted IS NULL
		');
		$persons = array();
		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$persons[] = $row;
		}
		return $persons;
	}
}