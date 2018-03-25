<?php

function all_agenda_by_user($user) {
	global $c;

	//tous les agendas lies a l'utilisateur connecte
	
	/*$sql = "SELECT * FROM agenda a 
					JOIN utilisateur u ON u.id_agenda = a.idAgenda
					JOIN utilisateur_groupe ug ON ug.utilisateur = u.login
					JOIN groupe g ON g.nom = ug.groupe
						WHERE "*/
	$sql = "SELECT * FROM agenda a JOIN utilisateur u ON a.idAgenda=u.id_agenda WHERE u.login='$user'";
	$result = mysqli_query($c, $sql);
	//creation du tableau qui contiendra les titres des agendas
	$tres = [];
	//remplissage du tableau
	
		$tres[] = mysqli_fetch_assoc($result);

	
		
	$sql = "SELECT * FROM agenda a 
					JOIN groupe g ON g.id_agenda = a.idAgenda
					JOIN utilisateur_groupe ug ON ug.groupe = g.nom 
						WHERE ug.utilisateur='$user'";
	$result = mysqli_query($c, $sql);
	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}
	
	//retour du tableau
	return $tres;

}


function agenda_by_user($user) {

	//recupération de la connexion a la bdd
	global $c;

	//tous les agendas lies a l'utilisateur connecte
	
	/*$sql = "SELECT * FROM agenda a 
					JOIN utilisateur u ON u.id_agenda = a.idAgenda
					JOIN utilisateur_groupe ug ON ug.utilisateur = u.login
					JOIN groupe g ON g.nom = ug.groupe
						WHERE "*/
	$sql = "SELECT * FROM agenda a JOIN utilisateur u ON a.idAgenda=u.id_agenda WHERE u.login='$user'";
	$result = mysqli_query($c, $sql);
	$tres = mysqli_fetch_assoc($result);

	//retour du tableau
	return $tres;
}


//Donne les agendas des groupes dont l'utilisateur est administrateur
function agendas_by_groupe_admin($user) {
	global $c;
	$sql = "SELECT * FROM agenda a JOIN groupe g ON g.id_agenda = a.idAgenda WHERE g.administrateur='$user'";
	$result = mysqli_query($c, $sql);
	$tres = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}
	return $tres;
}


function agendas_by_groupe_nonAdmin($user) {
	global $c;

	$administrateur = agendas_by_groupe_admin($user);
	$personnel = agenda_by_user($user);

	$sql = "SELECT * FROM agenda a 
					JOIN groupe g ON g.id_agenda = a.idAgenda
					JOIN utilisateur_groupe ug ON ug.groupe = g.nom 
						WHERE ug.utilisateur='$user'";
	$result = mysqli_query($c, $sql);
	$tres = [];
	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$libre = true;
		foreach ($administrateur as $admin) {
			if ($row['idAgenda'] == $admin['idAgenda']) {
				$libre = false;
			}

		}
		if ($row['idAgenda'] == $personnel['idAgenda']) {
			$libre = false;
		}
		if ($libre == true) {
			$tres[] = $row;
		}
		
	}

	return $tres;
	
}



function get_groupe_by_agenda($idAgenda) {
	//recupération de la connexion a la bdd
	global $c;
	//tous les groupes où l'utilisateur est l'administrateur
	$sql = "SELECT * FROM groupe g JOIN agenda a on g.id_agenda = a.idAgenda WHERE a.idAgenda='$idAgenda'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	//creation du tableau qui contiendra les noms des membres
	$groupe = mysqli_fetch_assoc($result);

	

	//retour du tableau
	return $groupe;
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
