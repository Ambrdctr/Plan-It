<?php
	if (isset($_SESSION['log'])) {
		$page = 'agenda';
	} else {
		$page = 'home';
	}
	if (isset($_GET["page"])) {
		$page = $_GET["page"];	
	}
	if (isset($_POST["action"])) {
		if ($_POST["action"] == "AjouterEvent") {
			if (ajouter_event($_POST)) {
				$page = 'agenda';
			} else {
				$_SESSION['error'] = "La date de début doit être antérieure à la date de fin";
				$page = 'ajout_event';
			}
		}

		if ($_POST["action"] == "AjouterAgenda") {
			if (ajouter_agenda($_POST['titre'])) {
				$page = 'agenda';
			} else {
				$_SESSION['error'] = "Vous avez déjà créé un agenda du même nom";
				$page = 'ajout_agenda';
			}
		}

		if ($_POST["action"] == "newEvent") {
			$page = 'ajout_event';
		}
		if ($_POST["action"] == "newAgenda") {
			$page = 'ajout_agenda';
		}
		if ($_POST["action"] == "DELETE_EVENT") {
			supprimer_event($_POST["idValue"]);
		}
		if ($_POST["action"] == "SIGNIN") {
			$page = 'sign-in';
		}
		if ($_POST["action"] == "SIGNUP") {
			$page = 'sign-up';
		}
		if ($_POST["action"] == "SIGNOUT") {
			disconnect();
			$page = 'home';
		}
		if ($_POST["action"] == "CONNEXION") {
			if(log_in($_POST["login"],$_POST["pwd"])) {
				$_SESSION['agenda'] = first_agenda($_SESSION['log']);
				$page = 'agenda';
			} else {
				$page = 'sign-in';
			}	
		}
		elseif ($_POST["action"] == "CREER") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"])) {
				$page = 'ajout_agenda';
			} else {
				$page = 'sign-up';
			}
		}
	}
?>