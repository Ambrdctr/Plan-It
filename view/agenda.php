<label for="id_select" class="rouge">Agenda courant</label>

<div class="scrollbox">
	<?php
		$values = agendas_by_user($_SESSION['log']);
		foreach ($values as $value) {
			echo "<input type='checkbox' name='agenda_select' id='agenda_".$value['idAgenda']."' value='".$value['idAgenda']."'/><label for='agenda_".$value['idAgenda']."'>&nbsp;&nbsp;".$value['titre']."</label><br />";
		}
	?>
</div>

<button type="button" name="button" id="select_all" class="btn btn-primary"><span class="fa fa-check-square-o"></span>&nbsp;&nbsp;Tout</button>

<button type="button" name="button" id="deselect_all" class="btn btn-primary"><span class="fa fa-square-o"></span>&nbsp;&nbsp;Rien</button>

<span id="loader" style="display: none;"><img src="./images/loader.gif" alt="loading" style="width: 30px; margin-bottom: -10px" /></span>

<h1 id="id_titre"></h1>

<ul id="events" class="list-group">
</ul>


<button type="button" class="btn btn-primary" id="display_calendar">Display</button>


</head>

<body>

<div style="display: block;" id='calendar'></div>
