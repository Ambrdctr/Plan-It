<script type="text/javascript" src="./javascript/script.js"></script>
<script type="text/javascript" src="./javascript/XHR.js"></script>
<script type="text/javascript" src="./javascript/AJAX_recup_events_agenda.js"></script>

<label for="id_select" class="rouge">Agenda courant</label>

<select name="select" id="id_select" required autofocus onchange="ecrire(this.options[this.selectedIndex].innerHTML, 'id_titre'); request(this);">
	<?php
		$values = agendas_by_user($_SESSION['log']);
		foreach ($values as $value) {
			echo "<option value=".$value['idAgenda'].">".$value['titre']."</option>";
		}
	?>
</select>


<span id="loader" style="display: none;"><img src="./images/loader.gif" alt="loading" style="width: 30px; margin-bottom: -10px" /></span>

<h1 id="id_titre"></h1>

<form method="POST" action=".">
	<button type="submit" value="newAgenda" class="button" name="action" ><span>Nouvel agenda </span></button>
</form>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
				        <h5 for="close_button" class="modal-title col-sm-4" id="exampleModalLabel">Ajouter un évenement</h5>
				        <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      </div>
			      <div class="modal-body">
			        <?php include_once "ajout_event.php" ?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

							<!-- Envoi -->
							<input type="hidden" name="agenda" id="id_agenda" value="">
			        <button type="submit" class="btn btn-success" name="action" value="AjouterEvent" onsubmit="request(document.getElementById('id_select'));">Ajouter</button>
			      </div>
					</form> <!-- fin du formulaire d'ajout d'event -->
			    </div>
			  </div>
			</div>

<div id="events">aucun event</div>

<script>
	var div = document.getElementById('id_select');
	ecrire(div.options[div.selectedIndex].innerHTML, 'id_titre');
	request(div);
</script>

		</div>
	</div>
</div>
