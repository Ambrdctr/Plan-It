<?php
function afficher() {
	global $c;
	$sql = "SELECT * FROM `test`";
	$result = mysqli_query($c, $sql);
	echo "<table>";
	echo "<caption>Resultats BDD</caption>";
	echo "<tr><th>Prenom</th><th>Nom</th><th>Sexe</th></tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$prenom = $row['prenom'];
		$nom = $row['nom'];
		$sexe = $row['sexe'];
		echo "<tr>";
		echo "<td>" . $prenom . "</td>";
		echo "<td>" . $nom . "</td>"; 
		echo "<td>" . $sexe . "</td>";
		echo "</tr>";
		}
	echo "</table>";
}

function afficher_events() {
	global $c;
	$sql = "SELECT * FROM `evenement` ORDER BY dateDebut";
	$result = mysqli_query($c, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		echo $row['nom']." ";
		echo $row['description']."<br />";
		echo substr($row['dateDebut'], 0, -3)."<br />";
	}
}