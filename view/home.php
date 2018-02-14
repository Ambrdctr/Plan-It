<?php 
afficher(); 
?>

<form method="POST" action="..">
	<label for="id_nom">Nom de l'évenement <span class="required">*</span> </label>
	<input type="text" name="nom" id="id_nom" placeholder="Nom" required="true" />

	<label for="id_desc">Description de l'évenement </label>
	<textarea name="desc" id="id_desc" placeholder="Description"></textarea>

	<p>Début</p>
	<label for="id_Ddebut">Date <span class="required">*</span> </label>
	<input type="date" name="Ddebut" id="id_Ddebut" required="true" />
	<label for="id_Hdebut">Heure </label>
	<input type="time" name="Hdebut" id="id_Hdebut" />

	<p>Fin</p>
	<label for="id_Dfin">Date <span class="required">*</span> </label>
	<input type="date" name="Dfin" id="id_Dfin" required="true" />
	<label for="id_Hfin">Heure </label>
	<input type="time" name="Hfin" id="id_Hfin" />
</form>

