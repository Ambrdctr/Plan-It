<?php

session_start();
include_once "../model/bdd.php";
header('Content-Type: application/json');

if (isset($_GET["IdAgenda"])) {
	$id = $_GET["IdAgenda"];
	/*$_SESSION["agenda"] = agenda_by_name_user($_GET["NomAgenda"], $_SESSION['log']);*/
}

if (isset($id)) {
	global $c;
	$sql = "SELECT e.* FROM evenement e JOIN agenda a ON e.agenda = a.idAgenda WHERE a.idAgenda = ".$id." AND e.agenda = ".$id."";
	$result = mysqli_query($c, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	echo json_encode($data);
}