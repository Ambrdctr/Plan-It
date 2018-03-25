<script type="text/javascript" src="./javascript/script.js"></script>

<div class="btn-group-vertical">
	<?php
		$agenda_prive = agenda_by_user($_SESSION['log']);
    $agenda_admin = agendas_by_groupe_admin($_SESSION['log']);
    $agenda_nonAdmin = agendas_by_groupe_nonAdmin($_SESSION['log']);

    ?>
    <div class="btn-group dropright" role="group">

          <button  <?php echo "id='agenda_".$agenda_prive['idAgenda']."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fa fa-user'></i> &nbsp; <i class='fa fa-unlock'></i> &nbsp; <?php echo $agenda_prive['titre']; ?>
          </button>
        	<div class="dropdown-menu" <?php echo "aria-labelledby='agenda_".$agenda_prive['idAgenda']."'"; ?>>
              <ul class="pagination pagination-lg">
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Ajouter un évenement dans cet agenda">
                  <a class="page-link" onclick="addOn_selected(<?php echo $agenda_prive['idAgenda']; ?>);" data-toggle="modal" data-target="#addOnModal">
                    <span class="fa fa-calendar-plus-o text-success"></span>
                  </a>
                </li>
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Effacer un évenement dans cet agenda">
                  <a class="page-link" onclick="deleteOn_selected(<?php echo $agenda_prive['idAgenda']; ?>);
                                                ecrire('<?php echo $agenda_prive['titre']; ?>', 'agenda_choisi');
                                                changeValue('<?php echo $agenda_prive['idAgenda']; ?>', 'id_deleteOn');
                                                cacher('search_list');
                                                " data-toggle="modal" data-target="#deleteOnModal">
                    <span class="fa fa-calendar-minus-o text-dark"></span>
                  </a>
                </li>
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Modifier cet agenda">
                  <a class="page-link" onclick="delete_selected(<?php echo $agenda_prive['idAgenda']; ?>);" data-toggle="modal" data-target="#deleteModal">
                    <span class="fa fa-wrench text-primary"></span>
                  </a>
                </li>
              </ul>
              <div class="dropdown-divider"></div>
                <p>Votre agenda personnel </p>
        </div>
      </div>



    <?php
    //Agenda admin
		foreach ($agenda_admin as $value) {?>
      <div class="btn-group dropright" role="group">

          <button  <?php echo "id='agenda_".$value['idAgenda']."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fa fa-group'></i> &nbsp; <i class='fa fa-unlock'></i> &nbsp; <?php echo $value['titre'];?>
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
                <li class="page-item" data-toggle="popover" data-placement="bottom" data-content="Modifier cet agenda">
									<a class="page-link" onclick="delete_selected(<?php echo $value['idAgenda']; ?>);" data-toggle="modal" data-target="#deleteModal">
										<span class="fa fa-wrench text-primary"></span>
									</a>
								</li>
              </ul>
              <div class="dropdown-divider"></div>
                <p>Agenda du groupe : <b><?php echo get_groupe_by_agenda($value['idAgenda'])['nom']; ?></b> </p>
                <p>Administrateur du groupe : <b><?php echo get_groupe_by_agenda($value['idAgenda'])['administrateur']; ?></b> </p>
        </div>
      </div><?php
    }



    //Agenda non admin
    foreach ($agenda_nonAdmin as $value) {?>
      <div class="btn-group dropright" role="group">

          <button  <?php echo "id='agenda_".$value['idAgenda']."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fa fa-group'></i> &nbsp; <i class='fa fa-lock'></i> &nbsp; <?php echo $value['titre']; ?>
          </button>
        <div class="dropdown-menu" <?php echo "aria-labelledby='agenda_".$value['idAgenda']."'"; ?>>


                <p>Agenda du groupe : <b><?php echo get_groupe_by_agenda($value['idAgenda'])['nom']; ?></b> </p>
                <div class="dropdown-divider"></div>
                <p>Administrateur du groupe : <b><?php echo get_groupe_by_agenda($value['idAgenda'])['administrateur']; ?></b> </p>
        </div>
      </div><?php
    }
  ?>
</div>

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
				<input type="hidden" name="action" value="AjouterEvent">

	      <button type="button" class="btn btn-success" onclick="superposition();">Ajouter</button>
				<!-- Dropdown menu de superposition -->
					<div class="dropdown dropleft" id="superposition_dropdown">
						  <div class="dropdown-menu" id="superposition_dropdown-menu">
								<p class="dropdown-item">Votre évènement : <strong id="drop_nom_agenda"></strong><br/>
								Se superpose avec <span id="superposition_nb" class="badge badge-danger"></span> autres evenements</p>
						    <div class="dropdown-item" id="superposition_detail"></div>
						    <div class="text-center">
									<button type="button" class="btn btn-primary" onclick="optimale_dropdown();">Date optimale</button>
									<div class="dropdown" id="optimale_dropdown">
											<div class="dropdown-menu" id="optimale_dropdown-menu">
												<p class="dropdown-item">Choisissez une plage horaire</p>
												<div class="dropdown-divider"></div>
												<div class="container dropdown-item">
													<div class="row">
														<div class="col-md-3">
															00:00
														</div>
														<div class="col-md-6">
															<p id="temps" class="text-primary"></p>
														</div>
														<div class="col-md-3">
															00:00
														</div>
													</div>
												</div>
												<div class="container-fluid">
													<div class="row">
														<div class="col-lg-12">
																<div class="dropdown-item text-center" id="slider-range"></div>
														</div>
													</div>
												</div>
												<div class="dropdown-divider"></div>
												<div class="text-center">
													<button type="button" class="btn btn-primary" id="ajouter_horaire">Ajouter</button>
													<button type="button" class="btn btn-success" id="valider_horaire">Trouver une date</button>
												</div>
												<div class="dropdown-divider"></div>
												<div class="container-fluid">
													<div class="dropdown-item" id="horaires"></div>
												</div>



											</div>
									</div>
									<button type="button" class="btn btn-secondary">Ignorer</button>
									<button type="button" class="btn btn-secondary">Autre date</button>
								</div>
						</div>
					</div>
		 </div>



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
