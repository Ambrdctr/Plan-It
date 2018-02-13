<?php
function new_account($login,$pwd1,$pwd2) {
	global $c;
	
	$rempli = !empty(trim($login)) && !empty(trim($pwd1)) && !empty(trim($pwd2));
	if ($rempli) {
		$login = mysqli_real_escape_string($c,strip_tags($login)); // Reformatage pour eviter les "hacks" et affichages etranges
		$pwd1 = mysqli_real_escape_string($c,strip_tags($pwd1));
		$pwd2 = mysqli_real_escape_string($c,strip_tags($pwd2));

		$free = true;
		$sql = "select * from utilisateur";
		$result = mysqli_query($c, $sql);
		while(($row = mysqli_fetch_assoc($result)) && $free == true) {
			if ($row["login"] == $login) {
				$free = false;
			}
		}
		if ($free) {
			if (strlen($pwd1) > 4) {
				if ($pwd1 == $pwd2) {

					$long = strlen($pwd1);
					$password = "&=@+" . $long . $pwd1 . "#1%";		//salt
					$password = hash('sha512', $password);		//hash

					$sql = "INSERT INTO utilisateur (login,password) 
					values ('".$login."',
							'".$password."')";

					$result = mysqli_query($c, $sql);
					$_SESSION["log"] = $login;
				} else {
					$_SESSION["error"] = "Mots de passe différents !";
				} 
			} else {
				$_SESSION["error"] = "Trop court !";
			}
		} else {
			$_SESSION["error"] = "Login déjà utilisé !";
		}
	} else {
		$_SESSION["error"] = "Champs vides interdits !";
	}

}

	
	
	
function log_in($login,$pwd) {
	global $c;

	$rempli = !empty(trim($login)) && !empty(trim($pwd));
	if ($rempli) {
		$login = mysqli_real_escape_string($c,strip_tags($login)); // Reformatage pour eviter les "hacks" et affichages etranges
		$pwd = mysqli_real_escape_string($c,strip_tags($pwd));

		$haveAccount = false;
		$goodPwd = false;
		$sql = "select * from utilisateur";
		$result = mysqli_query($c, $sql);
		while(($row = mysqli_fetch_assoc($result)) && $haveAccount == false) {
			if ($row["login"] == $login) {
				$haveAccount = true;

				$long = strlen($pwd);
				$password = "&=@+" . $long . $pwd . "#1%";		//salt
				$password = hash('sha512', $password);		//hash

				$goodPwd = ($row["password"] == $password);
			}
		}
		if ($goodPwd) {
			$_SESSION["log"] = $login;
		} else {
			$_SESSION["error"] = "Nom d'utilisateur ou mot de passe incorrect !";
		}
	} else {
		$_SESSION["error"] = "Champs vides interdits !";
	}
}



function disconnect() {
	unset($_SESSION["log"]);
}