<section>
<?php

	$arrayadmin = groupes_by_user($_SESSION['log']);
	$arraysimple = all_groupe_user($_SESSION['log']);
?>
		<table class='table table-bordered'>
			<caption>Listes de vos Groupes</caption>
			<tr>
				<th> Groupes <a href='#' data-toggle='modal' data-target='#creategroupeModal'<i class='fa fa-plus'></i></a></th>
			</tr>
			<?php
			if (count($arrayadmin) != 0){
				foreach($arrayadmin as $row) {
					?>
					<tr>
						<td>
							<div class="btn-group-vertical">
		      					<div class="btn-group dropright" role="group">
		        					<button <?php echo "id='id_modif_".$row['nom']."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class='fa fa-user-circle-o'></i> &nbsp; <?php echo $row['nom']; ?>
									</button>
									<div class="dropdown-menu" <?php echo "aria-labelledby='id_modif_" . $row['nom'] . "'"; ?>>
		            					<nav aria-label="...">
						              	<ul class="pagination pagination-md">
						                	<li class="page-item"><a class="page-link" href="#" data-toggle='modal' data-target='#adduserModal' onclick="changeGrp_selected_add('<?php echo $row['nom']; ?>');"><span class="fa fa-user-plus text-success"></span></a></li>
						                	<li class="page-item"><a class="page-link" href="#" data-toggle='modal' data-target='#deleteuserModal' onclick="changeGrp_selected_del('<?php echo $row['nom']; ?>');"><span class="fa fa-user-times text-danger"></span></a></li>
						              	</ul>
						            	</nav>
						          		<div class="dropdown-divider"></div>
						          			<p>Agenda : <?php echo get_agenda_by_groupe($row['nom']); ?> </p>
						          		<div class="dropdown-divider"></div>
						          			<p>Description : <?php echo get_desc_group($row['nom']); ?> </p>


						        	</div>
						    	</div>
						    </div>
						</td>
					</tr>

				<?php
				}
			}
			if (count($arraysimple) != 0) { 
				foreach($arraysimple as $row) {
					?>
					<tr>
						<td>
							<div class="btn-group-vertical">
		      					<div class="btn-group dropright" role="group">
		        					<button <?php echo "id='id_modif_".$row."'"; ?> type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo $row; ?>
									</button>
									<div class="dropdown-menu" <?php echo "aria-labelledby='id_modif_" . $row . "'"; ?>>
											<p>Agenda : <?php echo get_agenda_by_groupe($row); ?> </p>
										<div class="dropdown-divider"></div>
		            						<p>Description : <?php echo get_desc_group($row); ?> </p>


						        	</div>
						    	</div>
						    </div>
						</td>
					</tr>
					<?php
				}
			}
			if ((count($arraysimple) == 0) && (count($arrayadmin) == 0)) {
				echo "<tr>";
				echo "<td> Vous ne faites partit d'aucun groupe </td>";
				echo "</tr>"; 
			}
?>
	</table>
</section>






<div class="modal fade" id="creategroupeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Création d'un groupe</h5>
					<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<form method="POST" action="index.php">
				<div class="modal-body">
					<div class="form-group">
						<label for='id_nomGroupe'>Nom du groupe: <sup class='required'>*</sup></label>
						<input type='text' class="form-control" name='groupe' id='id_nomGroupe' required placeholder="Nom du groupe" />
					</div>
					<div class="form-group">
						<label for='id_description'>Description:<sup class='required'>*</sup></label>
						<input type='text' class="form-control" name='description' id='id_description' required placeholder="Description"/>
					</div>
					<div class="form-group">
						<label for='id_agenda_groupe'>Nom de l'agenda du groupe:<sup class='required'>*</sup></label>
						<input type='text' class="form-control" name='nom_agenda' id='id_agenda_groupe' required placeholder="Nom de l'agenda"/>
					</div>
					<p class='required'><sup>*</sup> Champs requis</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					<!-- Envoi -->
					<button name='action' type='submit' value='Creer' class="btn btn-primary">Création</button>
				</div>
			</form>
		</div>
	</div>
</div>






<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Ajouter un membre</h5>
				<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="index.php">
				<div class="modal-body">

					<div class="form-group">
						<label for='id_nomPersonne'>nom de la personne :</label>
						<input type='text' id='id_nomPersonne' name='nomPersonne'  required />
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					<!-- Envoi -->
					<div class="form-group">
						<input type='hidden' name='groupe_add' id='id_groupe_add' value=''/>
					</div>
					<input name='action' type='submit' value='Ajouter' class="btn btn-primary"></button>
				</div>
			</form>
		</div>
	</div>
</div>




<div class="modal fade" id="deleteuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Supprimer un membre</h5>
				<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="index.php">
				<div class="modal-body">
					<div class="form-group">
						<label for='id_selec_suppr'>Selectionner un membre :</label>
						<select name="selec_suppr" id="id_selec_suppr" required autofocus>
							<option value="" selected disabled hidden></option>
							<?php
								$values = user_by_groupes();
								foreach ($values as $value) {
									echo "<option value=".$value['nom'].">".$value['nom']."</option>";
								}
							?>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					<!-- Envoi -->
					<div class="form-group">
						<input type='hidden' name='groupe_del' id='id_groupe_del' value=''/>
					</div>
					<input name='action' type='submit' value='Supprimer' class="btn btn-primary"></button>
				</div>
			</form>
		</div>
	</div>
</div>






<!--
<div class="modal fade" id="eventgroupeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Ajouter un membre</h5>
				<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="." id="event" onsubmit="return verifAddEventForm(this)">
				<div class="modal-body">
					<div class="form-group row">
						<label for="id_type" class="col-sm-4 col-form-label">Nom de l'evenement<sup class='required'>*</sup></label>
						<div class="col-sm-8">
							<select name="type" form="event" id="id_type" class="form-control" required autofocus>
								<option value="" selected disabled hidden></option>
								<?php
									//$values = ['Reunion', 'Repas', 'Anniversaire', 'Cours', 'Examen'];
									//foreach ($values as $value) {
									//	echo "<option value=".$value.">".$value."</option>";
									//}
								?>
							</select>
						</div>
					</div>

					<!- Description -_
					<br />
					<label for="id_desc">Description de l'evenement </label>
					<textarea class="form-control" name="desc" id="id_desc" placeholder="Description" onblur="verifText(this)"></textarea>

					<!- Champs de dates -
					<br />
					<div class="container">
						<div class='col-md-12'>
							<div class="form-group">
								<label for="startTime">Debut</label>
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' class="form-control" name="debutTime" id="startTime" required readonly/>
									<button type="button" class="btn btn-primary input-group-addon">
										<span class="fa fa-calendar"></span>
									</button>
								</div>
							</div>
						</div>
						<div class='col-md-12'>
							<div class="form-group">
								<label for="endTime">Fin</label>
								<div class='input-group date' id='datetimepicker2'>
									<input type='text' class="form-control" name="finTime" id="endTime" required readonly/>
									<button type="button" class="btn btn-primary input-group-addon">
										<span class="fa fa-calendar"></span>
									</button>
								</div>
							</div>
						</div>
					</div>

					<!- Lieu -
					<br />
					<label for="id_lieu">Lieu </label>
					<input type="text" class="form-control" name="lieu" id="id_lieu" onblur="verifText(this)"/>

					<!- Options -
					<br />

					<div class="form-check">
					    <input type="checkbox" class="form-check-input" name="prio" id="id_prio">
					    <label class="form-check-label" for="id_prio">Prioritaire</label>
				  	</div>

					<div class="form-check">
					    <input type="checkbox" class="form-check-input" name="public" id="id_public">
					    <label class="form-check-label" for="id_public">Public</label>
				  	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					<!- Envoi -
					<div class="form-group">
						<input type='hidden' name='groupe_add_event' id='id_groupe_add_event' value=''/>
					</div>
					<button type="submit" class="btn btn-success" name="action" value="AjouterEventGroupe">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>
 -->






<!-- Modal -->
<div class="modal fade" id="eventgroupeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 for="close_button" class="modal-title col-sm-4" id="exampleModalLabel">Ajouter un évenement</h5>
          <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <p class="required" id="js_error"></p>
			<form method="POST" action="." id="event" onsubmit="return verifAddEventForm(this)">

				<!-- Type de l'evenement -->

				<div class="form-group row">
					<label for="id_type" class="col-sm-4 col-form-label">Nom de l'evenement<sup class='required'>*</sup></label>
					<div class="col-sm-8">
						<select name="type" form="event" id="id_type" class="form-control" required autofocus>
							<option value="" selected disabled hidden></option>
							<?php
								$values = ['Reunion', 'Repas', 'Anniversaire', 'Cours', 'Examen'];
								foreach ($values as $value) {
									echo "<option value=".$value.">".$value."</option>";
								}
							?>
						</select>
					</div>
				</div>


				<!-- Description -->
				<br />
				<label for="id_desc">Description de l'evenement </label>
				<textarea class="form-control" name="desc" id="id_desc" placeholder="Description" onblur="verifText(this)"></textarea>


				<!-- Champs de dates -->
				<br />

				<div class="container">
					<div class='col-md-12'>
							<div class="form-group">
									<label for="startTime">Debut</label>
									<div class='input-group date' id='datetimepicker1'>
											<input type='text' class="form-control" name="debutTime" id="startTime" required readonly/>
											<button type="button" class="btn btn-primary input-group-addon">
													<span class="fa fa-calendar"></span>
											</button>
									</div>
							</div>
					</div>
					<div class='col-md-12'>
							<div class="form-group">
									<label for="endTime">Fin</label>
									<div class='input-group date' id='datetimepicker2'>
											<input type='text' class="form-control" name="finTime" id="endTime" required readonly/>
											<button type="button" class="btn btn-primary input-group-addon">
													<span class="fa fa-calendar"></span>
											</button>
									</div>
							</div>
					</div>
			</div>


				<!-- Lieu -->
				<br />
				<label for="id_lieu">Lieu </label>
				<input type="text" class="form-control" name="lieu" id="id_lieu" onblur="verifText(this)"/>


				<!-- Options -->
				<br />

				<div class="form-check">
			    <input type="checkbox" class="form-check-input" name="prio" id="id_prio">
			    <label class="form-check-label" for="id_prio">Prioritaire</label>
			  </div>

				<div class="form-check">
			    <input type="checkbox" class="form-check-input" name="public" id="id_public">
			    <label class="form-check-label" for="id_public">Public</label>
			  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <!-- Envoi -->
        <input type="hidden" name='groupe_add_event' id='id_groupe_add_event' value="">
        <button type="submit" class="btn btn-success" name="action" value="AjouterEventGroupe">Ajouter</button>
      </div>
    </form> <!-- fin du formulaire d'ajout d'event -->
    </div>
  </div>
</div>
