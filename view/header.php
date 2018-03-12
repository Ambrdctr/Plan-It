<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Plan'it!</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="icon" href="./images/favicon.ico" />

</head>
<body>
<header>
	    <img src="./images/logo.png" alt="Plan'it" id="logo"/>

	    	<?php
			if (!isset($_SESSION["log"])) {

			?>
	    			
				<button class="button" id="btnConnect" ><span>Connexion </span></button>
				<button class="button" id="btnInscrip" ><span>Inscription </span></button>
			
	    	<?php
	    		}
	    		else{
	    	?>
	    		<ul class="menuactif">
  					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn"><?php echo($_SESSION["log"]); ?></a>
						<div class="dropdown-content">
							<form id="menu_profil" action="index.php" method="post">
						  	<input type="hidden" name="action" value="PROFIL"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_profil").submit()'>profil</a>

							<form id="menu_agenda" action="index.php" method="post">
						  	<input type="hidden" name="action" value="AGENDA"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_agenda").submit()'>mes agendas</a>

							<form id="menu_groupe" action="index.php" method="post">
						  	<input type="hidden" name="action" value="INFOGROUPE"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_groupe").submit()'>mes groupes</a>

						  	<form id="menu_notif" action="index.php" method="post">
						  	<input type="hidden" name="action" value="NOTIFICATION"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_notif").submit()'>notifications</a>

						  	<form id="menu_emploiDuTemps" action="index.php" method="post">
						  	<input type="hidden" name="action" value="EMPLOIDUTEMPS"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_emploiDuTemps").submit()'>gérer emploi du temps</a>

						  	<form id="menu_event" action="index.php" method="post">
						  	<input type="hidden" name="action" value="EVENNEMENT"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_event").submit()'>évènnement à venir</a>

						  	<form id="menu_deco" action="index.php" method="post">
						  	<input type="hidden" name="action" value="SIGNOUT"/></form> 
						  	<a href='#' onclick='document.getElementById("menu_deco").submit()'>déconnexion</a>
						</div>
					</li>
				</ul>


			<?php
				}
	    	?>
	    
</header>
<nav>
	<ul>
	</ul>
</nav>

	<!-- MODAL Connexion-->
	<div id="modalConnect" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>Authentification</h2>
			</div>
			<div class="modal-body">
				<?php
					include_once "sign-in.php";
				?>
			</div>
		</div>
	</div>

	<!--MODAL Connexion-->
	<div id="modalInscrip" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>Inscription</h2>
			</div>
			<div class="modal-body">
				<?php
					include_once "sign-up.php";
				?>
			</div>
		</div>
	</div>


	<script>
		// Get the modal
		var modalco = document.getElementById('modalConnect');
		var modalinscr = document.getElementById('modalInscrip');

		// Get the button that opens the modal
		var btnco = document.getElementById("btnConnect");
		var btninscr = document.getElementById("btnInscrip");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btnco.onclick = function() {
		    modalco.style.display = "block";
		}
		btninscr.onclick = function() {
		    modalinscr.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modalco.style.display = "none";
		}
		span.onclick = function() {
		    modalinscr.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modalco) {
		        modalco.style.display = "none";
		    }
		    if (event.target == modalinscr) {
		    	modalinscr.style.display = "none";
		    }
		}
	</script>

<?php
		include_once "$page.php";
?>