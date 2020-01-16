<?php

require('database.php');
$db = new MysqliDb('localhost','root','','seminarskizodijak');

session_start();
if(!isset($_SESSION['ulogovaniKorisnik'])){
  $_SESSION['ulogovaniKorisnik'] = array();
}

?>
