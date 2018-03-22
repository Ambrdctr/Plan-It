<section>
<?php
	$groupe = $_POST["groupe"];
	$array = getGroupe($groupe);
	

	if (count($array) == 0) {
		echo "Groupe inconnu ou mal orthographié";
	
	}
	else {
		echo "<table>";
		echo "<caption>Membres du groupe ". $groupe ."</caption>";
		echo "<tr>";
		echo "<th>login</th>";
		echo "<th>mail</th>";
		echo "</tr>";

		foreach($array as $row) {
			echo "<tr>";
			echo "<td>". $row["login"] ."</td>";
			echo "<td>". $row["mail"] ."</td>";
			echo "</tr>";

		}
	}
?>

<form method='post' action='index.php'>
	<p>
		<label for='retour'></label>
		<input name='retour' type='submit' value='Retour' class="button"/>
	</p>
</form>
</section>