<?php

class Prognoza {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function novaPrognoza() {
		if(!isset($_POST['znak']) || !isset($_POST['tip']) || !isset($_POST['opis']) || !isset($_POST['datum'])){
			return false;

		}
		if($_POST['znak']=='' || $_POST['tip']=='' || $_POST['opis'] == '' || $_POST['datum'] == ''){
			return false;

		}
		$parameters = '[{'.

			'"znakID"'.':'.'"'.$_POST['znak'].'",'.
			'"tipID"'.':'.'"'.$_POST['tip'].'",'.
			'"opis"'.':'.'"'.$_POST['opis'].'",'.
			'"datum"'.':'.'"'.$_POST['datum'].'"'

			.'}]';


			$curl_zahtev = curl_init("http://localhost/seminarskizodijak/rest/novaPrognoza.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);



			if($json_objekat == "Uspesno ste ubacili prognozu!") {
				return true;
			}
			else {
				return false;
			}
	}



	public function izmeni($id) {
		if(!isset($_POST['znak']) || !isset($_POST['tip']) || !isset($_POST['opis']) || !isset($_POST['datum'])){
			return false;

		}
		if($_POST['znak']=='' || $_POST['tip']=='' || $_POST['opis'] == '' || $_POST['datum'] == ''){
			return false;

		}

		$parameters = '[{'.

			'"znakID"'.':'.'"'.$_POST['znak'].'",'.
			'"tipID"'.':'.'"'.$_POST['tip'].'",'.
			'"opis"'.':'.'"'.$_POST['opis'].'",'.
			'"prognoza"'.':'.'"'.$id.'",'.
			'"datum"'.':'.'"'.$_POST['datum'].'"'

			.'}]';


			$curl_zahtev = curl_init("http://localhost/seminarskizodijak/rest/izmenaPrognoze.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);


			if($json_objekat == "Uspesno ste izmenili prognozu!") {
				return true;
			}
			else {
				return false;
			}
	}

}

?>
