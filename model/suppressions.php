<?php
	function supprimer_event($id) {
		global $c;
		$sql = "DELETE FROM evenement WHERE idEvent = '$id'";
		mysqli_query($c, $sql);
	}