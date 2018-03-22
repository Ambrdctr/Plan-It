<script type="text/javascript" src="./javascript/script.js"></script>

<div class="btn-group-vertical">
	<?php
		$values = agendas_by_user($_SESSION['log']);
		foreach ($values as $value) {?>
      <div class="btn-group dropright" role="group">
        <button  <?php echo "id='agenda_".$value['idAgenda']."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $value['titre']; ?>
        </button>
        <div class="dropdown-menu" <?php echo "aria-labelledby='agenda_".$value['idAgenda']."'"; ?>>
              <ul class="pagination pagination-lg">
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Ajouter un évenement dans cet agenda">
                  <a class="page-link" onclick="addOn_selected(<?php echo $value['idAgenda']; ?>);" data-toggle="modal" data-target="#addOnModal">
                    <span class="fa fa-calendar-plus-o text-success"></span>
                  </a>
                </li>
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Effacer un évenement dans cet agenda">
									<a class="page-link" onclick="deleteOn_selected(<?php echo $value['idAgenda']; ?>);
										 														ecrire('<?php echo $value['titre']; ?>', 'agenda_choisi');
																								changeValue('<?php echo $value['idAgenda']; ?>', 'id_deleteOn');
																								cacher('search_list');
																								" data-toggle="modal" data-target="#deleteOnModal">
										<span class="fa fa-calendar-minus-o text-dark"></span>
									</a>
								</li>
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Supprimer cet agenda">
									<a class="page-link" onclick="delete_selected(<?php echo $value['idAgenda']; ?>);" data-toggle="modal" data-target="#deleteModal">
										<span class="fa fa-calendar-times-o text-danger"></span>
									</a>
								</li>
              </ul>
        </div>
      </div><?php
    }
	?>
</div>

<form method="POST" action=".">
	<button type="submit" value="newAgenda" class="button" name="action" ><span>Nouvel agenda </span></button>
</form>




<!-- 																																						Modal ajout -->


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



<!-- 																																						Modal suppression-->


<div class="modal fade" id="deleteOnModal" tabindex="-1" role="dialog" aria-labelledby="deleteOnModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 for="close_button" class="modal-title col-sm-4" id="deleteOnModalLabel">Supprimer un évenement</h5>
          <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
				<p>Agenda choisi : <span id="agenda_choisi" class="font-weight-bold"></span></p>
				<nav class="navbar navbar-light bg-light">
					<div class="form-inline">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Rechecher..." aria-label="Search" aria-describedby="search_addon" value="" id="search_field"/>
							<div class="input-group-append">
			          <div class="input-group-text" id="search_addon"><span class="fa fa-search"></span></div>
			        </div>
						</div>
					</div>
				</nav>

				<ul id="search_list" class="list-group">
					<li class='list-group-item' data-toggle='popover' data-placement='bottom' data-content='test'>Salut</li>
				</ul>
        <?php include_once "delete_event.php" ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <!-- Envoi -->
				<input type="hidden" name="agenda" id="id_event_delete" value="">
        <input type="hidden" name="agenda" id="id_deleteOn" value="">
        <button type="submit" class="btn btn-danger" name="action" value="SupprimerEvent">Supprimer</button>
      </div>
    </form> <!-- fin du formulaire d'ajout d'event -->
    </div>
  </div>
</div>



<!-- 																																						Modal agenda suppression-->



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 for="close_button" class="modal-title col-sm-4" id="deleteModalLabel">Ajouter un évenement</h5>
          <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php include_once "delete_agenda.php" ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <!-- Envoi -->
        <input type="hidden" name="agenda" id="id_delete" value="">
        <button type="submit" class="btn btn-danger" name="action" value="AjouterEvent">Supprimer</button>
      </div>
    </form> <!-- fin du formulaire d'ajout d'event -->
    </div>
  </div>
</div>
