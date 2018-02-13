<section>

<article class="connect">
<h1>Création d'un nouveau compte</h1>
	<form method="post" action="index.php">
		<p>
			<label for='login'>Login<sup class='error'>*</sup> : </label>
			<input type='text' name='login' required/>
		</p>
		<p>
			<label for='pwd1'>New password<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd1' required/>
		</p>
		<p>
			<label for='pwd2'>Repeat password<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd2' required/>
		</p>
		<p>
			<label for='action'></label>
			<input name='action' type='submit' value='CREATE'/>
		</p>	
	</form>
</article>
<p><sup class='error'>*</sup> : Champs obligatoires</p>

</section>