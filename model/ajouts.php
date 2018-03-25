<?php
	function ajouter_event($event) {
		$type = $event['type'];
		$desc = $event['desc'];
		$debutTime = $event['debutTime'];
		$finTime = $event['finTime'];
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

		global $c;
		$sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin, lieu, prioritaire, public, agenda)
				values ('".$type."','".$desc."','".$debutTime."','".$finTime."','".$lieu."',".$prio.",".$public.",'".$agenda."')";
		mysqli_query($c, $sql);

		return true;
	}



	function ajouter_event_groupe($event, $groupe) {
		# Récuperation des valeurs du formulaire
		$type = $event['type'];
		$desc = $event['desc'];
		$debutTime = $event['debutTime'];
		$finTime = $event['finTime'];
		$lieu = $event['lieu'];
		/*var_dump($type);
		var_dump($desc);
		var_dump($groupe);*/

		# Si l'évennement est prioritaire
		if (isset($event['prio'])) {
			$prio = 1;
		} else {
			$prio = 0;
		}

		# Si l'évennement est public
		if (isset($event['public'])) {
			$public = 1;
		} else {
			$public = 0;
		}

		# base de donnée
		global $c;
		$sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin, lieu, prioritaire, public) # Agenda ?
				values ('".$type."','".$desc."','".$debutTime."','".$finTime."','".$lieu."',".$prio.",".$public."')";
		mysqli_query($c, $sql);


		# Lien avec le groupe
		$id = mysqli_insert_id($c);


		global $c;
		$sql = "INSERT INTO evenement_groupe (id_evenement, groupe)
				values ('".$id."','".$groupe."')";
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
