function surligne(champ, erreur) {
	if (erreur)
		champ.style.backgroundColor = "#fba";
	else
		champ.style.backgroundColor = "";
}

function stripHTML(champ) {
	return $("<div/>").html(champ.value).text();
}

function verifDesc(champ) {
	if (champ.value != stripHTML(champ)) {
		surligne(champ, true);
		return false;
	} else {
		surligne(champ, false);
		return true;
	}
}