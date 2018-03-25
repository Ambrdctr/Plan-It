<?php
function new_account($login,$mail,$pwd1,$pwd2,$agenda) {
	global $c;

	
	$rempli = !empty(trim($login)) && !empty(trim($mail)) && !empty(trim($pwd1)) && !empty(trim($pwd2)) ;
	if ($rempli) {
		$login = mysqli_real_escape_string($c,strip_tags($login)); // Reformatage pour eviter les "hacks" et affichages etranges
		$pwd1 = mysqli_real_escape_string($c,strip_tags($pwd1));
		$pwd2 = mysqli_real_escape_string($c,strip_tags($pwd2));
		$mail = mysqli_real_escape_string($c,strip_tags($mail));

		$free = true;
		
		$sql = "select * from utilisateur";
		$result = mysqli_query($c, $sql);
		while(($row = mysqli_fetch_assoc($result)) && $free == true) {
			if (($row["login"] == $login) || ($row["mail"] == $mail)) {
				$free = false;
			}
		}

		if ($free)  {
			if (strlen($pwd1) > 4) {
				if ($pwd1 == $pwd2) {

					$long = strlen($pwd1);
					$password = "&=@+" . $long . $pwd1 . "#1%";		//salt
					$password = hash('sha512', $password);		//hash

					$sql = "INSERT INTO utilisateur (login,password,mail) 
					values ('".$login."',
							'".$password."',
							'".$mail."')";

					$result = mysqli_query($c, $sql);
					$_SESSION["log"] = $login;


					//creation de l'agenda
					ajouter_agenda($agenda);
					//recup de l'ID
					$id = mysqli_insert_id($c);

					$sql = "UPDATE utilisateur SET id_agenda = '$id' WHERE login = '$login'";
					mysqli_query($c, $sql);

					ajout_image("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfcVd0PpZfKS7alp8MnQMoKUfGM1jHV9blLTfTsRFYiJFE-v1t");
					return true;
				} else {
					$_SESSION["error"] = "Mots de passe différents !";
				} 
			} else {
				$_SESSION["error"] = "Trop court !";
			}
		} else {
			$_SESSION["error"] = "Login ou mail déjà utilisé !";
		}
	} else {
		$_SESSION["error"] = "Champs vides interdits !";
	}
	return false;


	

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
			if (($row["login"] == $login) or ($row["mail"] == $login)) {
				$haveAccount = true;

				$long = strlen($pwd);
				$password = "&=@+" . $long . $pwd . "#1%";		//salt
				$password = hash('sha512', $password);		//hash

				$goodPwd = ($row["password"] == $password);
			}
		}
		if ($goodPwd) {
			$_SESSION["log"] = $login;
			return true;

		} else {
			$_SESSION["error"] = "Nom d'utilisateur ou mot de passe incorrect !";
			
		}
	} else {
		$_SESSION["error"] = "Champs vides interdits !";
		
	}
	return false;
}

function modif_mdp($ancienMdp, $pwd1, $pwd2) {
		global $c;

		
		$ancienMdp = mysqli_real_escape_string($c,strip_tags($ancienMdp)); // Reformatage pour eviter les "hacks" et affichages etranges
		$pwd1 = mysqli_real_escape_string($c,strip_tags($pwd1));
		$pwd2 = mysqli_real_escape_string($c,strip_tags($pwd2));
		$login = $_SESSION["log"]; 
		$sql = "SELECT password FROM utilisateur WHERE login = '$login'";
		$result = mysqli_query($c, $sql);
		$mdpBdd=mysqli_fetch_assoc($result)['password'];


		$long = strlen($ancienMdp);
		$password = "&=@+" . $long . $ancienMdp . "#1%";		//salt
		$password = hash('sha512', $password);
		
		if ($mdpBdd == $password){

			if ($pwd1 == $pwd2){
				$long = strlen($pwd1);
				$password = "&=@+" . $long . $pwd1 . "#1%";		//salt
				$password = hash('sha512', $password);		//hash
			 	$sql = "UPDATE utilisateur SET password = '$password'WHERE login = '$login'";
				mysqli_query($c, $sql);
				return true;
			 } else {
			    return false;
			 		}
			 }
		}
		
		

	

function modif_mail($ancienMail, $mail1, $mail2) {
		global $c;

		$login = $_SESSION["log"]; 
		$sql = "SELECT mail FROM utilisateur WHERE login = '$login'";

		$result = mysqli_query($c, $sql);
		$mailBdd=mysqli_fetch_assoc($result)['mail'];
		
		if ($mailBdd == $ancienMail){

			if ($mail1 == $mail2){
			 	$sql = "UPDATE utilisateur SET mail = '$mail1'WHERE login = '$login'";
				mysqli_query($c, $sql);
				return true;
			 } else {
			    return false;
			 		}
			 }
		}


function ajout_image($image){
		
	global $c;
	$login = $_SESSION["log"]; 
	$sql = "UPDATE utilisateur SET photo = '$image' WHERE login = '$login'";
	if (mysqli_query($c, $sql)){
	return true;
	} else {
	return false;
	}
}

function get_image(){
	//recupération de la connexion a la bdd
	global $c;
	$login = $_SESSION["log"]; 
	$sql = "SELECT photo FROM utilisateur WHERE login = '$login'";

	//recuperation des elements recuperes
	$result = mysqli_query($c, $sql);

	return mysqli_fetch_assoc($result)['photo'];

}
function disconnect() {
	unset($_SESSION["log"]);
}