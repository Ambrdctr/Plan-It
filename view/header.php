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
<nav>
	<ul>
	</ul>
</nav>

<?php
		include_once "$page.php";
?>