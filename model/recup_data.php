<?php

function agendas_by_user($user) {

	//recupération de la connexion a la bdd
	global $c;

	//tous les agendas lies a l'utilisateur connecte
	$sql = "SELECT * FROM agenda WHERE user='".$user."'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	//creation du tableau qui contiendra les titres des agendas
	$tres = [];

	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}

	//retour du tableau
	return $tres;
}




function first_agenda($user) {
	global $c;

	//recuperation du premier agenda entré par l'utilisateur
	$sql = "SELECT * FROM agenda WHERE user = '".$user."' ORDER BY idAgenda DESC";

	$result = mysqli_query($c, $sql);
	return mysqli_fetch_assoc($result);
}

function agenda_by_name_user($name, $user) {
	$sql = "SELECT * FROM agenda WHERE titre = '".$name."' AND user = '".$user."'";
	$result = mysqli_query($c, $sql);
	return mysqli_fetch_assoc($result);
}
