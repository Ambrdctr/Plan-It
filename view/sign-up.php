<section>

<article class="connect">
<h1>Création d'un nouveau compte</h1>
		<?php 
			if (isset($_SESSION["error"])) {
				echo "<p class='required'>".$_SESSION['error']."</p>";
				unset($_SESSION["error"]);
			}
		?>
	<p class="required" id="js_error"></p>
	<form method="post" action="index.php" onsubmit="return verifEmail(this.mail);">
		<p>
			<label for='id_login'>Pseudo<sup class='required'>*</sup> : </label>
			<input type='text' name='login' id='id_login' required placeholder="Login" />
		</p>
		<p>
			<label for='id_mail'>E-mail<sup class='required'>*</sup> : </label>
			<input type='text' name='mail' id='id_mail' required placeholder="Exemple@mail.com"/>
		</p>
		<p>
			<label for='id_pwd1'>Nouveau mot de passe<sup class='required'>*</sup> : </label>
			<input type='password' name='pwd1' id='id_pwd1' required placeholder="Password"/>
		</p>
		<p>
			<label for='id_pwd2'>Repeter le mot de passe<sup class='required'>*</sup> : </label>
			<input type='password' name='pwd2' id='id_pwd2' required placeholder="Password"/>
		</p>
		<p>
			<label for='id_action'></label>
			<input name='action' type='submit' id='id_action' value='CREER'/>
		</p>	
	</form>
</article>
<p><sup class='required'>*</sup> : Champs obligatoires</p>

</section>