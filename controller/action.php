<?php

<<<<<<< HEAD
=======

>>>>>>> raphael
	/* Page d'acceuil */
	if (isset($_SESSION['log'])) {
		$page = 'mes_agendas';
	} else {
		$page = 'home';
	}


	/* Get page */

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}


	/* Post page */

	if (isset($_POST["action"])) {

	/* Connexion inscription */

		/* Deconnexion */
		if ($_POST["action"] == "SIGNOUT") {
			disconnect();
			$page = 'home';
		}

		/* Connexion */
		if ($_POST["action"] == "CONNEXION") {
			if(log_in($_POST["login"],$_POST["pwd"])) {
				$_SESSION['agenda'] = first_agenda($_SESSION['log']);
<<<<<<< HEAD
=======
				$page = 'agenda';
			} else {
				$page = 'home';
			}
		}

		/* Inscription */
		elseif ($_POST["action"] == "CREER") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"])) {
				$page = 'ajout_agenda';
			} else {
				$page = 'home';
			}
		}


	/* Gestion des evenements */

		/* Ajouter un evenement à un agenda */
		if ($_POST["action"] == "AjouterEvent") {
			if (ajouter_event($_POST)) {
>>>>>>> raphael
				$page = 'agenda';
			} else {
				$page = 'home';
			}
		}

		/* Inscription */
		elseif ($_POST["action"] == "CREER") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"])) {
				$page = 'ajout_agenda';
			} else {
				$page = 'home';
			}
		}


	/* Gestion des evenements */

		/* Ajouter un evenement à un agenda */
		if ($_POST["action"] == "AjouterEventGroupe") {
			if (ajouter_event_groupe($_POST, $_POST['groupe_add_event'])) {
				$page = 'info_groupe';
			} else {
				$_SESSION['error'] = "La date de début doit être antérieure à la date de fin";
				$page = 'ajout_event';
			}
		}

		/* Supprimer un evenement */
		if ($_POST["action"] == "DELETE_EVENT") {
			supprimer_event($_POST["idValue"]);
		}

		/* Creation d'un nouvel event */
		if ($_POST["action"] == "newEvent") {
			$page = 'ajout_event';
		}


	/* Gestion des agendas */

		/* Creation d'un agenda */
		if ($_POST["action"] == "AjouterAgenda") {
			if (ajouter_agenda($_POST['titre'])) {
				$page = 'agenda';
			} else {
				$_SESSION['error'] = "Vous avez déjà créé un agenda du même nom";
				$page = 'ajout_agenda';
			}
		}

		/* Formulaire de creation */
		if ($_POST["action"] == "newAgenda") {
			$page = 'ajout_agenda';
		}

<<<<<<< HEAD

		/* Gestion des groupes */
=======
		/* Menu de navigation */
>>>>>>> raphael

		if ($_POST["action"] == "INFOGROUPE") {
			$page = 'info_groupe';
		}
<<<<<<< HEAD
		if ($_POST["action"] == "PROFIL") {
			$page = 'profil';
		}
=======

		if ($_POST["action"] == "INFOAGENDA") {
			$page = 'mes_agendas';
		}

		if ($_POST["action"] == "PLANNING") {
			$page = 'agenda';
		}

		/* Gestion des groupes */


>>>>>>> raphael
		if ($_POST["action"] == "CHERCHER") {
			$page = 'affiche_groupe';

		}
<<<<<<< HEAD
		if ($_POST["action"] == "Creer") {
			if(newGroupe($_POST["groupe"],$_POST["description"], $_SESSION['log'])) {
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
			}
		}

		if ($_POST["action"] == "Ajouter") {
			if(addPersonne($_POST["nomPersonne"],$_POST["groupe_add"])) {
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
=======
		if ($_POST["action"] == "CREER LE GROUPE") {
			if(newGroupe($_POST["nom"],$_POST["description"], $_SESSION['log'])) {
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
			}
		}

		if ($_POST["action"] == "AJOUTER LA PERSONNE") {
			if(addPersonne($_POST["nomPersonne"],$_POST["select"])) {
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
>>>>>>> raphael
			}

		}

<<<<<<< HEAD
		if ($_POST["action"] == "Supprimer") {
			if(deletePersonne($_POST["selec_suppr"],$_POST["groupe_del"])) {
=======
		if ($_POST["action"] == "SUPPRIMER LA PERSONNE") {
			if(deletePersonne($_POST["nomPers_suppr"],$_POST["selec_suppr"])) {
>>>>>>> raphael
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
			}

		}

	}

?>
