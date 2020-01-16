<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "seminarskizodijak";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function unesiPrognozu($data) {
		$mysqli = new mysqli("localhost", "root", "", "seminarskizodijak");
		$cols = '(znakID, tipID, opis, datum)';

		$values = "(".$data[0]['znakID'].",".$data[0]['tipID'].",'".$data[0]['opis']."','".$data[0]['datum']."')";

		$query = 'INSERT into prognoza '.$cols. ' VALUES '.$values;

		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	function izmeniPrognozu($data) {
		$mysqli = new mysqli("localhost", "root", "", "seminarskizodijak");
		$cols = '(znakID, tipID, opis, datum)';

		$query = "update prognoza set znakID=".$data[0]['znakID'].",tipID=".$data[0]['tipID'].",opis='".$data[0]['opis']."',datum='".$data[0]['datum']."' where prognozaID=".$data[0]['prognoza'];


		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	function vratiTipove() {
		$mysqli = new mysqli("localhost", "root", "", "seminarskizodijak");
		$q = 'SELECT * FROM tip ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function vratiZnakove() {
		$mysqli = new mysqli("localhost", "root", "", "seminarskizodijak");
		$q = 'SELECT * FROM znak ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
