<?php

class Korisnik {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function login() {
		$username = $this->db->escape(trim($_POST['username']));
		$password = $this->db->escape(trim($_POST['password']));

		$params = Array($username, $password);
		$users = $this->db->rawQuery("SELECT * FROM korisnik WHERE username = ? AND password = ? LIMIT 1", $params);

		if(count($users) > 0) {

			$_SESSION['ulogovaniKorisnik'] = $users[0];

			return true;

		} else {
			return false;
		}

	}

	public function registracija(){
		$ime = $this->db->escape(trim($_POST['ime']));
		$username = $this->db->escape(trim($_POST['username']));
		$password = $this->db->escape(trim($_POST['password']));

		$data = Array (
				"imePrezime" => $ime,
				"username" => $username,
        "password" => $password
		);

		$sacuvano = $this->db->insert('korisnik', $data);

		if($sacuvano) {
			return true;
		}
		else {
			return false;
		}

 }

}

?>
