		<section>

<article class="connect">
<h1>Authentification</h1>
	<?php 
		if (isset($_SESSION["error"])) {
			echo "<p class='required'>".$_SESSION['error']."</p>";
			unset($_SESSION["error"]);
		}
	?>
	<form method="post" action="index.php">
		<p>
			<label for='id_login'>Pseudo<sup class='error'>*</sup> : </label>
			<input type='text' name='login' id='id_login' required placeholder="Login ou mail"/>
		</p>
		<p>
			<label for='id_pwd'>Mot de passe<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd' id='id_pwd' required placeholder="Password"/>
		</p>
		<p>
			<label for='id_action'></label>
			<input name='action' id='id_action' type='submit' value='CONNEXION'/>
		</p>    
	</form>
</article>
<p><sup class='error'>*</sup> : Champs obligatoires</p>

</section>