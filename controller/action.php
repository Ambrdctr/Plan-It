<?php

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
				$page = 'agenda';
			} else {
				$page = 'home';
			}
		}

		/* Inscription */
		elseif ($_POST["action"] == "CREER_compte") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"],$_POST['nom_agenda'])) {
				$page = 'agenda';
			} else {
				$page = 'home';
			}
		}


	/* Gestion des evenements */

		/* Ajouter un evenement à un agenda */
		if ($_POST["action"] == "AjouterEvent") {
<<<<<<< HEAD
=======
			
>>>>>>> develop
			if (ajouter_event($_POST)) {
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


		/* Menu de navigation */

		if ($_POST["action"] == "INFOGROUPE") {
			$page = 'info_groupe';
		}

<<<<<<< HEAD
=======
		if ($_POST["action"] == "NOTIF_FIN") {
			delete_notification($_POST["notif"]);
			$page = 'info_groupe';
		}

>>>>>>> develop
		if ($_POST["action"] == "PROFIL") {
			$page = 'profil';
		}

		if ($_POST["action"] == "INFOAGENDA") {
			$page = 'mes_agendas';
		}

		if ($_POST["action"] == "PLANNING") {
			$page = 'agenda';
		}

		if ($_POST["action"] == "NOTIFICATION") {
			$page = 'affiche_notification';
		}

<<<<<<< HEAD
=======
		/* Gestion des groupes */

>>>>>>> develop
		if ($_POST["action"] == "CHERCHER") {
			$page = 'affiche_groupe';

		}

		if ($_POST["action"] == "Creer") {
<<<<<<< HEAD
			if(newGroupe($_POST["groupe"],$_POST["description"], $_SESSION['log'])) {
=======
			if(newGroupe($_POST["groupe"],$_POST["description"], $_SESSION['log'], $_POST['nom_agenda'])) {
>>>>>>> develop
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
			}
		}

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
			}

		}

		if ($_POST["action"] == "Supprimer") {
			if(deletePersonne($_POST["selec_suppr"],$_POST["groupe_del"])) {
				$page = 'info_groupe';
			} else {
				$page = 'info_groupe';
			}

		}

		/* modif mail et mdp */
		if ($_POST["action"] == "modif_mdp") {
			if(modif_mdp($_POST["mdp"],$_POST["nvMdp"],$_POST["confMdp"])) {
				$page = 'profil';
			} else {
				$page = 'profil';
			}

		}

		if ($_POST["action"] == "modif_mail") {
			if(modif_mail($_POST["mail"],$_POST["nvMail"],$_POST["confMail"])) {
				$page = 'profil';
			} else {
				$page = 'profil';
			}

		}

		if ($_POST["action"] == "ajout_photo") {
			if(ajout_image($_POST["url_photo"])) {
				$page = 'profil';
			} else {

				$page = 'profil';
			}

		}


	}

?>
