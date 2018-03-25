<!-- cette page affiche toutes les notifications.
la fonctions get_notification() fonctionne bien,
la fonction delete_notification() fonctionne bien
mais la fonction delete_notification ne se lance pas

LORSQUE ON CLIQUE SUR UNE NOTIFICATION CA NOUS DIRIGE VERS LA PAS GROUPE ET CA SUPPRIME LA NOTIFICATION-->

<div class="container-fluid">
	<h2>Notifications</h2>
	<div class="list-group">

	<!--message informatif-->
	<div class="alert alert-primary w-25" role="alert" style="display: block" id="alert_notif">
  	Vous n'avez pas de notification
	</div>

	<?php
	//récuperation des notifications
	$notifications = get_notification($_SESSION['log']);
	if (count($notifications) > 0) {
		echo "<a href='#' class='list-group-item active'>Notifications de groupe</a>";
	}
	//on parcours toutes les notifications
	foreach ($notifications as $notif) {
		//le form doit envoyer un $_POST['action'] pour pouvoir changer de page une fois qu'on a cliqué sur la notification
		?>
		<script>document.getElementById('alert_notif').style.display = "none";</script>

		<form method="post" action="." id="notification_fin">
			<input type="hidden" name="notif" value="<?php echo $notif['id']; ?>">
			<input type="hidden" name="action" value="NOTIF_FIN">
		</form>

		<!-- la ligne de notification sur laquelle on clique -->
		<a href='#' class='list-group-item' onclick="document.getElementById('notification_fin').submit();">
													<strong><?php echo $notif['utilisateur_src']; ?></strong> vous a ajouté au groupe <strong><?php echo $notif['groupe']; ?></strong></a>
	<?php
	}
	?>
	</div>
</div>
