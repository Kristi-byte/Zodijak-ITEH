<?php
$znak = $_GET['znak'];
include("konekcija.php");
$whereUslov = '';
if($znak != 0){
$whereUslov = 'where z.znakID ='.$znak;	 
}

$prognoza=$db->rawQuery('select * from prognoza p join tip t on p.tipID=t.tipID join znak z on p.znakID=z.znakID '.$whereUslov);

echo(json_encode($prognoza));


 ?>