function test() {
	alert("test");
}

function surligne(champ, erreur) {
	if (erreur)
		champ.style.backgroundColor = "#fba";
	else
		champ.style.backgroundColor = "";
}

function reformat(champ) {
	var str = champ.value.trim();
	var div = document.createElement("div");
	div.innerHTML = str;
	var text = div.textContent || div.innerText || "";
	return text;
}

function verifText(champ) {
	if (champ.value != reformat(champ)) {
		surligne(champ, true);
		return false;
	} else {
		surligne(champ, false);
		return true;
	}
}

function verifEmail(champ) {
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	if(!regex.test(champ.value)) {
		document.getElementById("js_error").innerHTML = "Format email invalide";
	    surligne(champ, true);
	    return false;
	} else {
	    surligne(champ, false);
	    return true;
	}
}

function verifAddEventForm(f) {
	var descOk = verifText(f.desc);
	var lieuOk = verifText(f.lieu);
	if (descOk && lieuOk) {
      	return true;
	} else {
		document.getElementById("js_error").innerHTML = "Dommage...";
      	return false;
   }
}

function verifAddAgendaForm(f) {
	var titreOk = verifText(f.titre);
	if (titreOk) {
      	return true;
	} else {
		document.getElementById("js_error").innerHTML = "Dommage...";
      	return false;
   }
}

function ecrire(text, id) {
	document.getElementById(id).innerHTML = text;
}
