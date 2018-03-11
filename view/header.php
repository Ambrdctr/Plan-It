<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Plan'it!</title>
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="icon" href="./images/favicon.ico" />
</head>
<body>
<header>
	    <a href="."><img src="./images/logo.png" alt="Plan'it" id="logo"/></a>
	    <?php
				if (!isset($_SESSION["log"])) {
			?>
	    			<form id="connex_inscr" method="post" action="index.php">
	    				<button class="button" name="action" type="submit" value="SIGNIN"><span>Connexion </span></button>
	    				<button class="button" name="action" type="submit" value="SIGNUP"><span>Inscription </span></button>
	    			</form>
	    	<?php
	    		}
	    		else{
	    	?>
	    			<form id="connex_inscr" method="post" action="index.php">
						<button class="button" name='action' type='submit' value='SIGNOUT'><span>Déconnexion </span></button>
					</form>
			<?php
				}
	    	?>

</header>

<?php
		include_once "$page.php";
?>
