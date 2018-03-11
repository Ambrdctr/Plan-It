<?php
	function ajouter_event($event) {
		$type = $event['type'];
		$desc = $event['desc'];
		$Ddebut = $event['Ddebut'];
		$Dfin = $event['Dfin'];
		$Hdebut = $event['Hdebut'];
		$Hfin = $event['Hfin'];
		$Ddebut .= " ".$Hdebut;
		$Dfin .= " ".$Hfin;
		$lieu = $event['lieu'];
		$agenda = $event['agenda'];

		if (isset($event['prio'])) {
			$prio = 1;
		} else {
			$prio = 0;
		}

		if (isset($event['public'])) {
			$public = 1;
		} else {
			$public = 0;
		}

		if ($Ddebut >= $Dfin) {
			return false;
		}

		global $c;
		$sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin, lieu, prioritaire, public, agenda) 
				values ('".$type."','".$desc."','".$Ddebut."','".$Dfin."','".$lieu."',".$prio.",".$public.",'".$agenda."')";
		mysqli_query($c, $sql);
		return true;
	}

	function ajouter_agenda($titre) {
		global $c;
		$user = $_SESSION['log'];
		$sql = "SELECT * FROM agenda WHERE user = '".$user."'";
		$result = mysqli_query($c, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['titre'] == $titre) {
				return false;
			}
		}
		$sql = "INSERT INTO agenda (titre, user) VALUES ('".$titre."','".$user."')";
		mysqli_query($c, $sql);
		return true;
	}