<section id="first">

<div id="div_logo">
	<div alt="logo" class="logo image_resp"></div>
	<div alt="text_logo" class="logo black_img image_text_resp"></div>
</div>

<h1 class="devise">Planifiez-vous la vie.</h1>

<p class="description">
	<span style="font-weight: bold;">Plan'it!</span> est un outil de gestion d'emploi du temps. A la fois intuitif et intelligent il vous permettra d'optimiser votre journée. Vous bénéficierez aussi d'un assistant personnel 'Paul' pouvant prendre des rendez-vous ou encore proposer un créneau optimal pour vos courses. <span style="font-weight: bold;">Plan'it!</span> est simple, efficace et personnalisable !
</p>
<br />
<div class="container-fluid">
		<div class="text-center">
					<button class="btn btn-success" href="#" data-toggle="modal" data-target="#signupModal"><span>Inscrivez-vous, c'est gratuit !</span></button>
		</div>
</div>



<p class="discret">Vous avez déjà un compte ? <a href="#" data-toggle="modal" data-target="#signinModal">Connectez-vous</a></p>

</section>


<!-- Modals -->

<!-- sign in Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h5 for="close_button" class="modal-title col-sm-5" id="exampleModalLabel">Connectez-vous</h5>
					<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<form method="POST" action=".">
			<div class="modal-body">
				<div class="form-group">
					<label for='id_login'>Identifiant</label>
					<input type='text' class="form-control" name='login' id='id_login' required placeholder="Login ou mail"/>
				</div>
				<div class="form-group">
					<label for='id_pwd'>Mot de passe</label>
					<input type='password' class="form-control" name='pwd' id='id_pwd' required placeholder="Password"/>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

				<!-- Envoi -->
				<button type='submit' name='action' value='CONNEXION' class="btn btn-success">Connexion</button>
			</div>
		</form>
		</div>
	</div>
</div>
