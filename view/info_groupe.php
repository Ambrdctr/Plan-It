<section>
	<form method='post' action='index.php'>
		<p>
			<label for='id_nomGroupe'>Nom du groupe :</label>
			<input type='text' id='id_nomGroupe' name='groupe' required/>
		</p>
		<p>
			<label for='id_groupe'></label>
			<input name="action" id='id_groupe' type='submit' value='CHERCHER'/>
		</p>
	</form>
</section>


<section>
<h1>Création d'un nouveau groupe</h1>
		
	<form method="post" action="index.php">
		<p>
			<label for='id_NomGroupe'>Nom du groupe :</label>
			<input type='text' id='id_NomGroupe' name='nom'  required  />
		</p>
		<p>
			<label for='id_description'>description :</label>
			<input type='text' id='id_description' name='description'  required />
		</p>
		
		<p>
			<label for='id_NewGroupe'></label>
			<input name='action' type='submit' id='id_newGroupe' value='CREER LE GROUPE'/>
		</p>	
	</form>
</section>


<section>
<h1>Ajouter une personne à un groupe</h1>
		
	<form method="POST" action="index.php">
		<label for='id_select'>Selectionner un groupe :</label>
		<select name="select" id="id_select" required autofocus>
			<option value="" selected disabled hidden></option>
			<?php
				$values = groupes_by_user($_SESSION['log']);
				foreach ($values as $value) {
					echo "<option value=".$value['nom'].">".$value['nom']."</option>";
				}
			?>
		</select>
		<p>
			<label for='id_nomPersonne'>nom de la personne :</label>
			<input type='text' id='id_nomPersonne' name='nomPersonne'  required />
		</p>
		
		<p>
			<input name='action' type='submit' value='AJOUTER LA PERSONNE'/>
		</p>	
	</form>
</section>
