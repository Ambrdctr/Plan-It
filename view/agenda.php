<label for="id_select" class="rouge">Agenda courant</label>

<div class="scrollbox">
	<?php
		$values = all_agenda_by_user($_SESSION['log']);
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


<div class="modal fade" id="addOnModal" tabindex="-1" role="dialog" aria-labelledby="addOnModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 for="close_button" class="modal-title col-sm-4" id="addOnModalLabel">Ajouter un évenement</h5>
          <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <div class="form-group row">
            <label for="id_type" class="col-sm-4 col-form-label">Agenda<sup class='required'>*</sup></label>
            <div class="col-sm-8">
              <select name="type" form="event" id="id_type" class="form-control" required autofocus>
                <option value="" selected disabled hidden></option>
                <?php
                  $values = agendas_by_groupe_admin($_SESSION['log']);
                  echo "<option value=".agenda_by_user($_SESSION['log'])['titre'].">".agenda_by_user($_SESSION['log'])['titre']."</option>";

                  foreach ($values as $value) {
                    echo "<option value=".$value['titre'].">".$value['titre']."</option>";
                  }
                ?>
              </select>
            </div>
          </div>
        <?php include_once "ajout_event.php" ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Envoi -->
        <input type="hidden" name="agenda" id="id_addOn" value="">
        <button type="submit" class="btn btn-success" name="action" value="AjouterEvent">Ajouter</button>
      </div>
    </form> <!-- fin du formulaire d'ajout d'event -->
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" id="display_calendar">Display</button>


</head>

<body>

<div style="display: block;" id='calendar'></div>

