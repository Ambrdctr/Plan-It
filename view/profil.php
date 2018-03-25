
<!--<div class="btn-group-vertical">-->
	<br/>
	<div class="text-center">
	<?php
	$image = get_image();
	echo "<img src='".$image."' class='rounded mx-auto d-blockalt' alt='Photo de Profil' width='300'>";
	?>	
	</div>
	<br/>
	

	<div class='text-center'>
		<button type="button" class="btn btn-outline-primary" data-toggle='modal' data-target='#modifMdpModal'>
			<span class="fa fa-lock text-success"></span>&nbsp;&nbsp;Changer de mot de passe</button>

		<button type="button" class="btn btn-outline-primary" data-toggle='modal' data-target='#modifMailModal'>
			<span class="fa fa-envelope text-success"></span>&nbsp;&nbsp;Changer d'adresse mail</button>
			      					
			      					<!--<div class="btn-group dropright" role="group">
			        					<button  type="button" class="btn btn-light dropdown-toggle text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class='fa fa-user-circle-o'></i> &nbsp; 
										</button>
										<div class="dropdown-menu"
			            					<nav aria-label="...">
							              	<ul class="pagination pagination-md">
							                	<li class="page-item"><a class="page-link" href="#" data-toggle='modal' data-target='#modifMdpModal' ><span class="fa fa-lock text-success"></span></a></li>
							                	<li class="page-item"><a class="page-link" href="#" data-toggle='modal' data-target='#modifMailModal' ><span class="fa fa-envelope text-success"></span></a></li>
							              	</ul>
							            	</nav>
							          		<div class="dropdown-divider"></div>
							          			
							          		<div class="dropdown-divider"></div>
							          			


							        	</div>
							    	</div>
							    </div>-->




	<div class="modal fade" id="modifMdpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
						<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Modification mot de passe </h5>
						<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<form method="POST" action="index.php">
					<div class="modal-body">
						<div class="form-group">
							<label for='id_mdp'>mot de passe actuel: <sup class='required'>*</sup></label>
							<input type='password' class="form-control" name='mdp' id='id_mdp' required placeholder="Mot de passe actuel" />
						</div>
						<div class="form-group">
							<label for='id_nvMdp'>Nouveau mot de passe:<sup class='required'>*</sup></label>
							<input type='password' class="form-control" name='nvMdp' id='id_nvMdp' required placeholder="Nouveau mot de passe"/>
						</div>
						<div class="form-group">
							<label for='id_confMdp'>confirmation mot de passe:<sup class='required'>*</sup></label>
							<input type='password' class="form-control" name='confMdp' id='id_confMdp' required placeholder="Confirmation mot de passe"/>
						</div>
						<p class='required'><sup>*</sup> Champs requis</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

						<!-- Envoi -->
						<button name='action' type='submit' value='modif_mdp' class="btn btn-primary">Modifier</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modifMailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
						<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Modification mail </h5>
						<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<form method="POST" action="index.php">
					<div class="modal-body">
						<div class="form-group">
							<label for='id_mail'>Mail actuel: <sup class='required'>*</sup></label>
							<input type='text' class="form-control" name='mail' id='id_mail' required placeholder="Mail actuel" />
						</div>
						<div class="form-group">
							<label for='id_nvMail'>Nouveau mail: <sup class='required'>*</sup></label>
							<input type='text' class="form-control" name='nvMail' id='id_nvMail' required placeholder="Nouveau mail"/>
						</div>
						<div class="form-group">
							<label for='id_confMail'>Confirmation du nouveau mail: <sup class='required'>*</sup></label>
							<input type='text' class="form-control" name='confMail' id='id_confMail' required placeholder="Confirmation mail"/>
						</div>
						<p class='required'><sup>*</sup> Champs requis</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

						<!-- Envoi -->
						<button name='action' type='submit' value='modif_mail' class="btn btn-primary">Modifier</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br/>
<div class='text-center'>
	<button type="button" class="btn btn-outline-primary" data-toggle='modal' data-target='#addPDPModal'>
			<span class="fa fa-camera"></span>&nbsp;&nbsp;Changer de photo de profil</button>


	<!--<form method="POST" action="." onsubmit="return verifEmail(this.mail);">
					
						<div class="form-group">
							<label for="icone">Entrer l'URL de l'image :</label>
							<input type='text' class="form-control" name='url_photo' id='id_url_photo' />
							<button name='action' type='submit' value='ajout_photo' class="btn btn-primary">Envoyer</button>
						</div>

	</form>
-->
	<div class="modal fade" id="addPDPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
						<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Changer de photo de profil </h5>
						<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<form method="POST" action="index.php">
					<div class="modal-body">
						<div class="form-group">
							<label for='id_pdp'>Entrer l'url de l'image : <sup class='required'>*</sup></label>
							<input type='text' class="form-control" name='url_photo' id='id_url_mail' required placeholder="URL" />
						</div>
						<p class='required'><sup>*</sup> Champs requis</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

						<!-- Envoi -->
						<button name='action' type='submit' value='ajout_photo' class="btn btn-primary">Mofifier</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>


