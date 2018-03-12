<?php
	$page = 'home';


	if (isset($_GET["page"])) {
		$page = $_GET["page"];	
	}
	if (isset($_POST["action"])) {
		if ($_POST["action"] == "SIGNIN") {
			$page = 'sign-in';
		}
		if ($_POST["action"] == "SIGNUP") {
			$page = 'sign-up';
		}
		if ($_POST["action"] == "SIGNOUT") {
			disconnect();
		}
		if ($_POST["action"] == "CONNEXION") {
			if(log_in($_POST["login"],$_POST["pwd"])) {
				$page = 'home';
			} else {
				$page = 'sign-in';
			}
		}
		if ($_POST["action"] == "INFOGROUPE") {
			$page = 'info_groupe';
		}
		if ($_POST["action"] == "CHERCHER") {
			$page = 'affiche_groupe';
		
		}
		if ($_POST["action"] == "CREER LE GROUPE") {
			if(newGroupe($_POST["nom"],$_POST["description"], $_SESSION['log'])) {
				$page = 'home';
			} else {
				$page = 'info_groupe';
			}
		}

		if ($_POST["action"] == "AJOUTER LA PERSONNE") {
			if(addPersonne($_POST["nomPersonne"],$_POST["select"])) {
				$page = 'home';
			} else {
				$page = 'info_groupe';
			}
		}
		
		

		elseif ($_POST["action"] == "CREER") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"])) {
				$page = 'home';
			} else {
				$page = 'sign-up';
			}
			
		}

	}
	
	?>