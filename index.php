<?php
	session_start();
	// Model
	include_once "model/bdd.php";
	include_once "model/ajouts.php";
	include_once "model/connexion.php";

	include_once "model/suppressions.php";
	include_once "model/recup_data.php";

	include_once "model/groupe.php";



	// Controller
	include_once "controller/action.php";

	// View
	include_once "view/header.php";
	include_once "view/afficher.php";
	include_once "view/footer.php";
