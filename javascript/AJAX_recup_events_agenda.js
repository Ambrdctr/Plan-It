function request(oSelect) {



	var value = oSelect.options[oSelect.selectedIndex].value;
	var xhr   = getXMLHttpRequest();

	document.getElementById("id_agenda").value = value;

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			readData(xhr.response);
			document.getElementById("loader").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("loader").style.display = "inline";
		}
	};

	xhr.responseType = 'json';
	xhr.open("GET", "./JSON/JSON_recup_events_agenda.php?IdAgenda=" + value, true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.send();
}

function readData(oData) {
	var nodes = oData;
	var string = "";
	if (nodes.length > 0) {
		for (var i=0; i<nodes.length; i++) {
			node = nodes[i];
			string += "<p>" + node.nom + "<br />" + node.dateDebut + " " + node.dateFin + "<br />";
			if (node.description.length > 0) {
				string += node.description + "<br />";
			} else {
				string += "Aucune description <br />";
			}

			if (node.lieu.length > 0) {
				string += node.lieu + "<br />";
			} else {
				string += "Aucun lieu <br />";
			}
			string += "</p>";

			string += "<form method='POST' action='.'><input name='idValue' type='hidden' value='"+node.idEvent+"'/><button type='submit' class='btn btn-danger' name='action' value='DELETE_EVENT'><span class='fa fa-user' aria-hidden='true'></span>&nbsp;&nbsp;DELETE</button></form><br />";

		}
		document.getElementById("events").innerHTML = string;

	} else {
		document.getElementById("events").innerHTML = "aucun évènement";
	}
}
