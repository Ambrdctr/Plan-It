<section>
<?php
	if (!isset($_SESSION["log"])) {
		if (isset($_SESSION['error'])) {
			echo "<p class='error'>" . $_SESSION['error'] . "</p>";
			unset($_SESSION['error']);
		}
?>
<article class="connect">
<h1>Authentification</h1>
	<form method="post" action="index.php">
		<p>
			<label for='login'>Login<sup class='error'>*</sup> : </label>
			<input type='text' name='login' required/>
		</p>
		<p>
			<label for='pwd'>Password<sup class='error'>*</sup> : </label>
			<input type='password' name='pwd' required/>
		</p>
		<p>
			<label for='action'></label>
			<input name='action' type='submit' value='CONNECT'/>
		</p>    
	</form>
</article>
<article class="connect">
<p>Si vous ne possédez pas de compte nous vous invitons à en créer un :</p>
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

<?php
	}
	else {

		function displayUserInfos() {
			$infos = recupInfosUser($_SESSION["log"]);

			echo "<h2>" . $infos['login'] . "</h2>";
			echo "<h4>Votre solde : " . $infos['solde'] . "</h4>";
			if ($infos['solde'] <= 0) {
				echo "<p class='error'> Attention vous êtes en faillite !</p>";
			}
		}

		function displayUserBet($pseudo) {
			?>	
				<p>Voici vos paris : </p>
				<table>
					<tr>
						<th>Equipe Domicile</th>
						<th>Equipe Visiteur</th>
						<th>Date</th>
					</tr>
			<?php
			global $c;
			$sql = "SELECT `pari`, `winner` FROM `parisEffectues` WHERE `pseudo`='$pseudo'";
			$result = mysqli_query($c, $sql);
			$auMoins1 = False;
			while ($row = mysqli_fetch_assoc($result)) {
				$auMoins1 = True;
				$id = $row['pari'];
				$sqlPari = "SELECT * FROM `parisActifs` WHERE `idActifs`=$id";
				$resultPari = mysqli_query($c, $sqlPari);
				$pari = mysqli_fetch_assoc($resultPari);
				echo "<tr>";
				if ($row['winner'] == $pari['equipeD']) {
					echo "<td class='winner'>".$pari['equipeD']."</td>";
				} else {
					echo "<td>".$pari['equipeD']."</td>";
				}
				if ($row['winner'] == $pari['equipeV']) {
					echo "<td class='winner'>".$pari['equipeV']."</td>";
				} else {
					echo "<td>".$pari['equipeV']."</td>";
				}
				echo "<td>".$pari['date']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			if (!$auMoins1) {
				echo "<p class='info'>Vous n'avez pas encore parié. Foncez !</p>";
			}
		}

		displayUserInfos();
		displayUserBet($_SESSION["log"]);
?>
		<form method="post" action="index.php" class="justButton">
			<p>
				<label for='action'></label>
				<input name='action' type='submit' value='DISCONNECT'/>
			</p>
		</form>
<?php
	}

?>
</table>
</section>