<?php

require "conexion.php";

$id		= $_REQUEST['id'];
$mod 	= $_REQUEST['mod'];

$data = new stdClass();

$sql = "SELECT photo, size FROM ".$mod." WHERE idEmpleado = ".$id."";
$srtQuery = $db->Execute($sql);

$c = 0;

while( $row = $srtQuery->FetchRow()){
	$data->id[$c] = $row[0];
	$data->size[$c] = $row[1];
	$c++;
}

$data->num = $c;

echo json_encode($data);

?>