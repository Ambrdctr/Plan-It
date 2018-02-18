<?php 
if (isset($_SESSION["error"])) {
	echo "<p class='required'>".$_SESSION['error']."</p>";
	unset($_SESSION["error"]);
}
?>
<p class="required" id="js_error"></p>
<form method="POST" action="." id="event" onsubmit="return verifAddEventForm(this)">
	<label for="id_type">Nom de l'evenement<sup class='required'>*</sup> </label>
	<select name="type" form="event" id="id_type" required autofocus>
		<option value="" selected disabled hidden></option>
		<?php
			$values = ['Reunion', 'Repas', 'Anniversaire', 'Cours', 'Examen'];
			foreach ($values as $value) {
				echo "<option value=".$value.">".$value."</option>";
			}
		?>
	</select>

	<label for="id_desc">Description de l'evenement </label>
	<textarea name="desc" id="id_desc" placeholder="Description" onblur="verifText(this)"></textarea>

	<p>Debut</p>
	<label for="id_Ddebut">Date<sup class='required'>*</sup> </label>
	<input type="date" name="Ddebut" id="id_Ddebut" required="true" />
	<label for="id_Hdebut">Heure </label>
	<input type="time" name="Hdebut" id="id_Hdebut" />

	<p>Fin</p>
	<label for="id_Dfin">Date<sup class='required'>*</sup> </label>
	<input type="date" name="Dfin" id="id_Dfin" required="true" />
	<label for="id_Hfin">Heure </label>
	<input type="time" name="Hfin" id="id_Hfin" />

	<label for="id_lieu">Lieu </label>
	<input type="text" name="lieu" id="id_lieu" onblur="verifText(this)"/>

	<label for="id_prio">Prioritaire </label>
	<input type="checkbox" name="prio" id="id_prio" />
	
	<label for="id_public">Public </label>
	<input type="checkbox" name="public" id="id_public" />

	<input type="submit" name="action" value="Ajouter"/>
</form>

<p><sup class='required'>*</sup> : Champs obligatoires</p>