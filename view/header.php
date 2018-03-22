<!DOCTYPE html>
<html>
<head>

	<!-- Definition de l'encodage des characteres -->
	<meta charset="UTF-8">

	<!-- Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Titre de la page -->
	<title>Plan'it!</title>

	<!-- Ajouts des fiches de style -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-datetimepicker.min.css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel='stylesheet' href='./css/fullcalendar.min.css' />
	<link rel='stylesheet' media='screen and (max-width: 400px)' href='./css/mobile.css' />
	<link rel='stylesheet' media='screen and (min-width: 400px) and (max-width: 992px)' href='./css/tablet.css' />
	<link rel='stylesheet' media='screen and (min-width: 992px)' href='./css/desktop.css' />

	<!-- Ajouts du favicon -->
	<link rel="icon" href="./images/favicon.ico" />
</head>
<body>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="." id="logo_A">
				    <img src="./images/logo_P.png" width="30" height="30" class="d-inline-block align-top" alt="P">
				    <img src="./images/logo.png" width="70" height="30" class="d-inline-block align-top" alt="Plan'it" id="logo">
				  </a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>
						<li class="nav-item dropdown">
							<?php
								if (!isset($_SESSION["log"])) {
							?>
								<!-- Vue de l'utilisateur deconnecté -->
								<button type="button" class="button nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Connexion </span></button>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <form class="px-4 py-3" method="post" action=".">
											<div class="form-group">
												<label for='id_login'>Identifiant</label>
												<input type='text' class="form-control" name='login' id='id_login' required placeholder="Login ou mail"/>
											</div>
											<div class="form-group">
												<label for='id_pwd'>Mot de passe</label>
												<input type='password' class="form-control" name='pwd' id='id_pwd' required placeholder="Password"/>
											</div>
											<!-- Envoi -->
											<button type='submit' name='action' value='CONNEXION' class="btn btn-success">Connexion</button>
								  </form>
								</div>
							</li>
			    			<button type="button" class="button blue" data-toggle="modal" data-target="#signupModal"><span>Inscription </span></button>
					<?php
						}
						else{
							?>
								<!-- Vue de l'utilisateur connecté -->
								<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<button type="button" class="btn btn-secondary btn-circle"><span class='fa fa-user' aria-hidden='true'></span></button>
									<?php echo $_SESSION['log']; ?>
								</a>
								<div class="dropdown-menu dropdown-menu-right-left" aria-labelledby="navbarDropdown">
									<form method="post" action="." id="planning_form">
										<input type="hidden" name="action" value="PLANNING">
									</form>
									<a class="dropdown-item" href="#" onclick="document.getElementById('planning_form').submit();"><span class='fa fa-calendar fa-fw' aria-hidden='true'></span>&nbsp;&nbsp;Mon planning</a>
									<form method="post" action="." id="agenda_form">
										<input type="hidden" name="action" value="INFOAGENDA">
									</form>
									<a class="dropdown-item" href="#" onclick="document.getElementById('agenda_form').submit();"><span class='fa fa-book fa-fw' aria-hidden='true'></span>&nbsp;&nbsp;Mes agendas</a>
									<div class="dropdown-divider"></div>
									<form method="post" action="." id="groupe_form">
										<input type="hidden" name="action" value="INFOGROUPE">
									</form>
									<a class="dropdown-item" href="#" onclick="document.getElementById('groupe_form').submit();"><span class='fa fa-group fa-fw' aria-hidden='true'></span>&nbsp;&nbsp;Mes groupes</a>
									<a class="dropdown-item bg-grey" href="#"><span class='fa fa-bell-o fa-fw' aria-hidden='true'></span>&nbsp;&nbsp;Notification&nbsp;&nbsp;<span class="badge badge-primary ">0</span></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" onclick="document.getElementById('groupe_form').submit();"><span class='fa fa-user-circle fa-fw' aria-hidden='true'></span>&nbsp;&nbsp;Mon profil</a>
									<form method="post" action="." class="text-center">
										<button class="btn btn-danger" name='action' type='submit' value='SIGNOUT'><span>Deconnexion</span>&nbsp;&nbsp;<span class='fa fa-sign-out' aria-hidden='true'></span></button>
									</form>
								</div>
							</li>
			<?php
				}
	    	?>
				</div>
			</nav>

<!-- Modals -->

	<!-- sign up Modal -->
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
						<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Inscrivez-vous</h5>
						<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<form method="POST" action="." onsubmit="return verifEmail(this.mail);">
				<div class="modal-body">
					<div class="form-group">
						<label for='id_login'>Pseudo/Login<sup class='required'>*</sup></label>
						<input type='text' class="form-control" name='login' id='id_login' required placeholder="Pseudo" />
					</div>
					<div class="form-group">
						<label for='id_mail'>E-mail<sup class='required'>*</sup></label>
						<input type='text' class="form-control" name='mail' id='id_mail' required placeholder="nomprenom@mail.com"/>
					</div>
					<div class="form-group">
						<label for='id_pwd1'>Mot de passe<sup class='required'>*</sup></label>
						<input type='password' class="form-control" name='pwd1' id='id_pwd1' required placeholder="Mot de passe"/>
					</div>
					<div class="form-group">
						<label for='id_pwd2'>Confirmation du mot de passe<sup class='required'>*</sup></label>
						<input type='password' class="form-control" name='pwd2' id='id_pwd2' required placeholder="Confirmation"/>
					</div>
					<p class='required'><sup>*</sup> Champs requis</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					<!-- Envoi -->
					<button name='action' type='submit' value='CREER' class="btn btn-primary">Inscription</button>
				</div>
			</form>
			</div>
		</div>
	</div>

<?php
		include_once "$page.php";
?>
