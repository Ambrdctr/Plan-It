<?php
function getGroupe($groupe) {
	global $c;

	$sql = "select * from utilisateur u JOIN utilisateur_groupe g ON u.login=g.utilisateur WHERE g.groupe='$groupe'";
	$result = mysqli_query($c,$sql);

	$array = [];

	while($row = mysqli_fetch_assoc($result)){
		if (strtolower($row["groupe"]) == strtolower($groupe)) {
			$array[] = $row;
		}
	}

	return $array;
}

function newGroupe($nom,$description,$user){
	global $c;
	$groupfree = true;


		//$sql = "select * from utilisateur_groupe ug JOIN groupe g ON g.nom = ug.groupe WHERE g.nom='$nom'";
		$sql = "SELECT * FROM utilisateur_groupe";
		$result = mysqli_query($c, $sql);
		while($row = mysqli_fetch_assoc($result)) {
			if (strtolower($row['groupe']) == strtolower($nom)) {
				$groupfree = false;
				break;
			}
		}


		if ($groupfree)  {
				$sql = "INSERT INTO groupe (nom,description,administrateur)
				VALUES ('".$nom."',
						'".$description."',
						'".$user."')";

				mysqli_query($c, $sql);

				$sql = "INSERT INTO utilisateur_groupe (utilisateur,groupe)
				VALUES ('".$user."',
						'".$nom."')";

				mysqli_query($c, $sql);
		}
		else {
			$_SESSION["error"] = "Vous avez déjà utilisé ce nom de groupe !";
		}
	return $groupfree;
}



function groupes_by_user($user) {
	//recupération de la connexion a la bdd
	global $c;
	//tous les groupes où l'utilisateur est l'administrateur
	$sql = "SELECT * FROM groupe WHERE administrateur='$user'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	//creation du tableau qui contiendra les noms des groupes
	$tres = [];

	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}

	//retour du tableau
	return $tres;
}

function addPersonne($nomPersonne,$nomGroupe){
		global $c;
		$free1 = true;
		$free2 = false;

		$sql = "SELECT * FROM utilisateur_groupe WHERE groupe='$nomGroupe'";
		$result = mysqli_query($c, $sql);
		while($row = mysqli_fetch_assoc($result)){
			if ($row["utilisateur"] == $nomPersonne){
				$free1 = false;
				break;
			}
		}

		$sql = "SELECT * FROM utilisateur";
		$result = mysqli_query($c, $sql);
		while($row = mysqli_fetch_assoc($result)){
			if ($row["login"] == $nomPersonne){
				$free2 = true;
				break;
			}
		}

		if ($free1 && $free2){
			$sql = "INSERT INTO utilisateur_groupe (utilisateur,groupe)
				values ('".$nomPersonne."',
						'".$nomGroupe."')";

			$result = mysqli_query($c, $sql);



		}

}

function deletePersonne($nomPers,$nomGr){
		global $c;






			$sql = "DELETE FROM utilisateur_groupe WHERE utilisateur='$nomPers'";
			$result = mysqli_query($c, $sql);
					
}

function groupes_user($user) {
	//recupération de la connexion a la bdd
	global $c;
	//tous les groupes où l'utilisateur est l'administrateur
	$sql = "SELECT * FROM utilisateur_groupe WHERE utilisateur='$user'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	//creation du tableau qui contiendra les noms des groupes
	$tres = [];

	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}

	//retour du tableau
	return $tres;
}

function all_groupe_user($user) {

	$gr1 = groupes_by_user($user);
	$gr2 = groupes_user($user);
	$tres = [];
	$i = 0;
	$deja = false;
	foreach ($gr2 as $groupe2 ) {
		$deja = false;
		foreach ($gr1 as $groupe1) {
			if ($groupe2['groupe'] == $groupe1['nom']) {
				$deja = true;
			}
		}
		if ($deja == false){
			$tres[$i] = ($groupe2['groupe']);
		}
		$i++;
	}
	return $tres;
}

function get_desc_group($groupe) {
	//recupération de la connexion a la bdd
	global $c;

	$sql = "SELECT description FROM groupe WHERE nom='$groupe'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	return mysqli_fetch_assoc($result)['description'];
}



function user_by_groupes($groupe) {
	//recupération de la connexion a la bdd
	global $c;
	//tous les groupes où l'utilisateur est l'administrateur
	$sql = "SELECT * FROM utilisateur_groupe WHERE groupe='$groupe'";

	//$sql = "SELECT * FROM utilisateur_groupe ug JOIN groupe g ON ug.groupe=g.nom WHERE ug.groupe='$groupe'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	//creation du tableau qui contiendra les noms des membres
	$tres = [];

	//remplissage du tableau
	while ($row = mysqli_fetch_assoc($result)) {
		$tres[] = $row;
	}

	//retour du tableau
	return $tres;

}
