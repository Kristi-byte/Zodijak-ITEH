<?php
include ("konekcija.php");
if(!isset($_GET['id'])){
	header("Location: admin.php");
}
$id=$_GET['id'];
$db->where('prognozaID',$id);
$db->delete('prognoza');
header("Location:admin.php");
 ?>