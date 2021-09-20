<?php
session_start();
require "../../inc/conexion.php";
//Fichero de conexion con l base de datos
//include_once("db.php");
$id = $_POST['id'];
$data = $_POST['id'];

//$data = json_decode($data);

if(!empty($id)){

	$query = "SELECT * FROM event WHERE id = $id";
	$sqlQuery = $db->Execute($query);
	$row = $sqlQuery->FetchRow();

	$data = new stdClass();

	$data->id = $id;
	$data->title = $row['title'];
	$data->startDate = $row['start'];
	$data->endDate = $row['end'];
	$data->allDay = $row['allday'];
	$data->description = $row['description'];
	$data->label = $row['label'];

	echo json_encode($data);
	//Comprobar si guardó en la base de datos a través de "mysqli_insert_id" el cual comprueba si existe el ID del último dato insertado
	/*if(mysqli_insert_id($conexion)){
		$_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'>El evento registrado con éxito<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}else{
		$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>Error al registrar el evento<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}*/
	
}else{
	echo 0;
	//$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>Error al registrar el evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//header("Location: index.php");
}