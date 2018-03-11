<?php 
if (isset($_SESSION["error"])) {
	echo "<p class='required'>".$_SESSION['error']."</p>";
	unset($_SESSION["error"]);
}
?>
<p class="required" id="js_error"></p>
<form method="POST" action="." id="event" onsubmit="return verifAddAgendaForm(this)">
	<label for="id_titre">Titre<sup class='required'>*</sup> </label>
	<input type="text" name="titre" id="id_titre" onblur="verifText(this)"/>

	<input type="submit" name="action" value="AjouterAgenda"/>
</form>

<p><sup class='required'>*</sup> : Champs obligatoires</p>