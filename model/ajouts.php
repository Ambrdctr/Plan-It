<?php
	function ajouter_event($event) {
		$type = $event['type'];
		$desc = $event['desc'];
		$Ddebut = $event['Ddebut'];
		$Dfin = $event['Dfin'];
		$Hdebut = $event['Hdebut'];
		$Hfin = $event['Hfin'];
		$Ddebut .= " ".$Hdebut;
		$Dfin .= " ".$Hfin;
		$lieu = $event['lieu'];

		if (is_null($event['prio'])) {
			$prio = 0;
		} else {
			$prio = 1;
		}

		if (is_null($event['public'])) {
			$public = 0;
		} else {
			$public = 1;
		}

		if ($Ddebut >= $Dfin) {
			return false;
		}

		global $c;
		$sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin, lieu, prioritaire, public) 
				values ('".$type."','".$desc."','".$Ddebut."','".$Dfin."','".$lieu."',".$prio.",".$public.")";
		/*$sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin) 
				values ('Reunion','blablabla', '2015-08-12', '2015-09-12')";*/
		$result = mysqli_query($c, $sql);
		return true;
	}