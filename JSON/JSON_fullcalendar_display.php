<?php

<<<<<<< HEAD
=======

>>>>>>> raphael
include_once "../model/bdd.php";
header('Content-Type: application/json');

if (isset($_GET["IdAgenda"])) {
<<<<<<< HEAD
	$datas = $_GET["IdAgenda"];
}

$data = [];
if (isset($datas)) {
	foreach ($datas as $id) {
		global $c;
		$sql = "SELECT * FROM evenement WHERE agenda = $id";
		$result = mysqli_query($c, $sql);
		$data = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$row['dateDebut'][10] = "T";
			$row['dateFin'][10] = "T";

			$row['title'] = $row['nom'];
			unset($row['nom']);

			$row['start'] = $row['dateDebut'];
			unset($row['dateDebut']);

			$row['end'] = $row['dateFin'];
			unset($row['dateFin']);
			$data[] = $row;
		}
	}
}

echo json_encode($data);
=======
	$id = $_GET["IdAgenda"];
	/*$_SESSION["agenda"] = agenda_by_name_user($_GET["NomAgenda"], $_SESSION['log']);*/
}

if (isset($id)) {
	global $c;
	$sql = "SELECT * FROM evenement WHERE agenda = $id";
	$result = mysqli_query($c, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$row['dateDebut'][10] = "T";
		$row['dateFin'][10] = "T";

		$row['title'] = $row['nom'];
		unset($row['nom']);

		$row['start'] = $row['dateDebut'];
		unset($row['dateDebut']);

		$row['end'] = $row['dateFin'];
		unset($row['dateFin']);
		$data[] = $row;
	}

	echo json_encode($data);
}
>>>>>>> raphael
