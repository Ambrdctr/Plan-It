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
		elseif ($_POST["action"] == "CREER") {
			if(new_account($_POST["login"],$_POST["mail"],$_POST["pwd1"],$_POST["pwd2"])) {
				$page = 'home';
			} else {
				$page = 'sign-up';
			}
			
		}

	}
	
	?>