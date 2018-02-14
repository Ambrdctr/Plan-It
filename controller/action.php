<?php
	$page = 'home';
	//$page = 'home';
	$page = 'agenda';

	if (isset($_POST["action"])) {
		if ($_POST["action"] == "Ajouter") {
			if (ajouter_event($_POST)) {
				$page = 'agenda';
			} else {
				$_SESSION['error'] = "La date de début doit être antérieure à la date de fin";
				$page = 'ajout_event';
			}
		}

		if ($_POST["action"] == "newEvent") {
			$page = 'ajout_event';
		}
	}

	?>