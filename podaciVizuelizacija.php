<?php
include("konekcija.php");

	$array['cols'][] = array('label' => 'Tip','type' => 'string');
    $array['cols'][] = array('label' => 'Broj prognoza', 'type' => 'number');

		$sql="SELECT t.nazivTipa, COUNT( p.prognozaID ) as broj FROM prognoza p JOIN tip t ON p.tipID = t.tipID GROUP BY t.tipID";

		$n = $db->rawQuery($sql);
		foreach($n as $vrednost){
		 $array['rows'][] = array('c' => array( array('v'=>$vrednost['nazivTipa']),array('v'=>(int)$vrednost['broj']))) ;

		}

		$niz_json = json_encode ($array);
		print ($niz_json);




?>
