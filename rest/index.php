<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	die("prazno");
});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /znakovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiZnakove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});
Flight::route('GET /tipovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiTipove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});
Flight::route('POST /novaPrognoza.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->unesiPrognozu($json_data);
	if($db->getResult())
	{
		$response = "Uspešno ste ubacili prognozu!";
	}
	else
	{
		$response = "Neuspešno ste ubacili prognozu!";

	}

	echo indent(json_encode($response));

});

Flight::route('POST /izmenaPrognoze.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->izmeniPrognozu($json_data);
	if($db->getResult())
	{
		$response = "Uspešno ste izmenili prognozu!";
	}
	else
	{
		$response = "Neuspešno ste izmenili prognozu!";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
