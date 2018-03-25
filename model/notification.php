<?php
function add_notification($userDST,$groupe) {
	global $c;

	$sql = "INSERT INTO notification (groupe,utilisateur_src)
	VALUES ('".$groupe."',
			'".$_SESSION['log']."')";
	mysqli_query($c, $sql);

	$id = mysqli_insert_id($c);
	$sql = "INSERT INTO utilisateur_notification (utilisateur,id_notification)
	VALUES ('".$userDST."',
			'".$id."')";
	mysqli_query($c, $sql);

	return true;
}


function delete_notification($id) {
	global $c;

	$sql = "DELETE FROM notification WHERE id=$id";
	mysqli_query($c, $sql);

	$sql = "DELETE FROM utilisateur_notification WHERE id_notification=$id";
	mysqli_query($c, $sql);

	return true;
}


function get_number_notification($user) {
	//recupération de la connexion a la bdd
	global $c;

	$sql = "SELECT * FROM utilisateur_notification WHERE utilisateur='$user'";
	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	$nombre_notif = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		$nombre_notif++;
	}

	return $nombre_notif;
}


function get_notification($user) {
	global $c;
	$notification = [];
	if (get_number_notification($user) > 0) {
		$sql = "SELECT * FROM notification n
						JOIN utilisateur_notification un ON n.id=un.id_notification
							WHERE un.utilisateur='$user'";
		//recuperation des elements recuperes
		$result = mysqli_query($c, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$notification[] = $row;
		}


	}
	return $notification;

}
