<section>

<article class="connect">
<h1>Création d'un nouveau compte</h1>
	<form method="post" action="index.php">
		<p>
			<label for='id_login'>Pseudo<sup class='error'>*</sup> : </label>
			<input type='text' name='login' id='id_login' required placeholder="Login" />
		</p>
		<p>
			<label for='id_mail'>E-mail<sup class='error'>*</sup> : </label>
			<input type='text' name='mail' id='id_mail' required placeholder="Exemple@mail.com"/>
		</p>
		<p>
			<label for='id_pwd1'>Nouveau mot de passe<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd1' id='id_pwd1' required placeholder="Password"/>
		</p>
		<p>
			<label for='id_pwd2'>Repeter le mot de passe<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd2' id='id_pwd2' required placeholder="Password"/>
		</p>
		<p>
			<label for='id_action'></label>
			<input name='action' type='submit' id='id_action' value='CREER'/>
		</p>	
	</form>
</article>
<p><sup class='error'>*</sup> : Champs obligatoires</p>

</section>