<?php
	
	$page = 'home';

	if (isset($_POST["action"])) {
		if ($_POST["action"] == "Ajouter") {
			if (ajouter_event($_POST)) {
				$page = 'home';
			} else {
				$_SESSION['error'] = "La date de début doit être antérieure à la date de fin";
				$page = 'home';
			}
			
		}
	}

	?>